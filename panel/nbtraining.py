import mysql.connector as sql
from datetime import datetime as dt
import pandas as pd
import sklearn
from sklearn.tree import DecisionTreeRegressor



# NIM, Latihan_ke, Text, U_Summary, S_Summary, Similarity, Tanggal
mydb = sql.connect(
  host="localhost",
  user="root",
  password="",
  database="learn"
)
kursor = mydb.cursor()

def getupdatedb():
	kursor.execute("SELECT nilai_huruf, waktu_huruf, latihan_ke FROM hasil")
	return kursor.fetchall()[-1]

def updatedb():
	p = getupdatedb()
	kursor.execute("INSERT INTO nbtrainer(nilai_user, waktu, latihan_ke) VALUES(%s,%s,%s)",(p[0],p[1],p[2]))
	mydb.commit()

def getdb(colname):
	kursor.execute(f"SELECT {colname} FROM nbtrainer")
	# print(kursor.fetchall())
	return [data[0] for data in kursor.fetchall()]

def getlast():
	dbase = {"nilai_user":getdb("nilai_user")[-1],
			 "waktu":getdb("waktu")[-1],
			 "latihan_ke":getdb("latihan_ke")[-1],
			 "next":getdb("next")[-1]}
	# print(dbase)
	return dbase

def writecsv():
	data = getlast()
	# print(data)
	with open("nbtraining.csv", 'a+') as f:
		f.write(f"{data['nilai_user']},{data['waktu']},{data['latihan_ke']}")
		f.close()

def rewritecsv():
	data = getlast()
	with open("nbtraining.csv", "r") as f:
		k = f.readlines()
		print(k[-1])
		f.close()

	with open("nbtraining.csv", "a+") as f:
		f.write(f",{data['next']}\n")
		f.close()

def training():
	dbase = pd.read_csv("nbtraining.csv")
	y = dbase["level"]

	pre = ["nilai","waktu","latke"]
	X = dbase[pre]

	model1 = DecisionTreeRegressor(random_state = 1)
	model1.fit(X.iloc[:-1],y.iloc[:-1])

	train1 = model1.predict(X.iloc[-1:])
	print(f"{int(train1[-1])} \n ----------------------------- \n {y.iloc[-1:]}")

	# dbase["level"][-1:] = int(train1)
	return int(train1)

def getID_DB(table):
	# command = "SELECT id FROM %s"
	kursor.execute(f"SELECT id FROM {table}")
	return max(kursor.fetchall())[0]

def switcher(key):
	switch = {
		1:'Very Easy',
		2:'Easy',
		3:'Medium',
		4:'Hard',
		5:'Expert',
	}
	return switch[key]

def run():
	updatedb()
	writecsv()
	idnb = getID_DB("nbtrainer")
	idhs = getID_DB("hasil")
	result = training()
	lvl = switcher(result)

	kursor.execute("UPDATE nbtrainer SET next = %s WHERE id = %s",(result,idnb,))
	kursor.execute("UPDATE hasil SET next_level = %s WHERE id = %s",(lvl,idhs))
	mydb.commit()

	rewritecsv()

run()