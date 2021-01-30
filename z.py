import mysql.connector as sql
from datetime import datetime as dt

# NIM, Latihan_ke, Text, U_Summary, S_Summary, Similarity, Tanggal
mydb = sql.connect(
  host="localhost",
  user="root",
  password="",
  database="learn"
)
kursor = mydb.cursor()

def getID_DB():
	command = "SELECT id FROM hasil"
	kursor.execute(command)
	return max(kursor.fetchall())[0]

def getNilai():
	command = "SELECT nilai FROM hasil"
	kursor.execute(command)
	return kursor.fetchall()[-1][0]

def getTime():
	x = getID_DB()
	cmd = "SELECT waktu_mulai, waktu_selesai FROM hasil WHERE id = %s"
	res = kursor.execute(cmd,(x,))
	data = kursor.fetchall()
	# print(data)
	mulai = dt.strptime(str(data[0][0]),"%Y-%m-%d %H:%M:%S")
	selesai = dt.strptime(str(data[0][1]),"%Y-%m-%d %H:%M:%S")
	selisih = selesai-mulai
	return selisih

def getHuruf(nilai, time):
	if nilai > 85:
		nskor = 1
	elif nilai >= 76:
		nskor = 2
	elif nilai >= 66:
		nskor = 3
	elif nilai >= 56:
		nskor = 4
	elif nilai < 55:
		nskor = 5

	time = round((time.seconds/60)%60,2)
	# print(time)
	if time <= 3:
		tskor = 1
	elif time <= 6:
		tskor = 2
	elif time <= 9:
		tskor = 3
	elif time <= 12:
		tskor = 4
	elif time > 12:
		tskor = 5

	return [nskor,tskor]

# p = getNilai()
# print(p)
huruf = getHuruf(getNilai(),getTime())
print(huruf)