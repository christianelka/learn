from difflib import SequenceMatcher
import mysql.connector as sql
import sys
from datetime import datetime as dt


# NIM, Latihan_ke, Text, U_Summary, S_Summary, Similarity, Tanggal
mydb = sql.connect(
  host="localhost",
  user="root",
  password="",
  database="learn"
)
kursor = mydb.cursor()

def getDB(id):
	command = "SELECT * FROM raw_data WHERE id_soal = %s"
	kursor.execute(command,(id,))
	return kursor.fetchall()[0]

def getText():
	return getDB(sys.argv[1])[1]

def getSummary():
	return getDB(sys.argv[1])[2]

def getUsummary():
	command = "SELECT user_summary FROM hasil WHERE username = %s"
	kursor.execute(command,(sys.argv[2],))
	return kursor.fetchall()[-1][0]

def getID_DB():
	command = "SELECT id FROM hasil"
	kursor.execute(command)
	return max(kursor.fetchall())[0]

def rate():
	summ = getSummary()
	usumm = getUsummary()
	return round(((SequenceMatcher(None, usumm, summ).ratio())*100),2)

def getInfo(nim):
	command = "SELECT username FROM hasil"
	kursor.execute(command)
	mentah = kursor.fetchall()
	matang = []
	for i in range(len(mentah)):
		matang.append(mentah[i][0])
	return matang.count(nim)

def update():
	nim = sys.argv[2]
	latke = getInfo(nim)
	text = getText()
	u_summary = getUsummary()
	s_summary = getSummary()
	similar = rate()
	status = ''
	if (similar >= 76):
		status = 'Success'
	else:
		status = 'Failed'
	print(similar)
	tanggal = dt.now().strftime('%Y-%m-%d %H:%M:%S')
	ID = getID_DB()

	command = "UPDATE hasil SET status = %s, latihan_ke = %s, soal = %s, bot_summary = %s, nilai = %s, tanggal = %s WHERE id = %s"
	val = (status,latke, text, s_summary, similar, tanggal, ID)
	kursor.execute(command,val)
	mydb.commit()

update()
