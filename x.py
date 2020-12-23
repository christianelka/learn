import mysql.connector as sql
import random

# NIM, Latihan_ke, Text, U_Summary, S_Summary, Similarity, Tanggal
mydb = sql.connect(
  host="localhost",
  user="root",
  password="",
  database="learn"
)
kursor = mydb.cursor()

levelist = ["Very Easy",
		 "Easy",
		 "Medium",
		 "Hard",
		 "Expert"]

jumlah = [30,27,24,20,15]

cmd = "SELECT id_soal from raw_data"
kursor.execute(cmd)
hasil = kursor.fetchall()

checker1 = {"Very Easy":0,"Easy":0,"Medium":0,"Hard":0,"Expert":0}
checker2 = {"Very Easy":30,"Easy":27,"Medium":24,"Hard":20,"Expert":15}
checker3 = []

i = 1
while True:
	try:
		level = random.choice(levelist)
		# print(level)
		id_soal = random.randint(1,116)
		# print(checker3)

		# print(level,id_soal)
		if id_soal not in checker3 and checker1[level] < checker2[level]:
			checker3.append(id_soal)
			checker1[level]+=1

		elif id_soal in checker3 or checker1[level] > checker2[level]:
			print("same / full")
			continue

		# command = "UPDATE hasil SET status = %s, latihan_ke = %s, soal = %s, bot_summary = %s, nilai = %s, tanggal = %s WHERE id = %s"
		cmd = "UPDATE raw_data SET level = %s WHERE id_soal = %s"
		val = (level,id_soal)
		kursor.execute(cmd,val)
		mydb.commit()
		print("%s. Berhasil, ID : %s ; Level : %s"%(i,id_soal,level))
		if i == 116:
			print("sukses")
			break
		i+=1
	except:
		import pdb; pdb.set_trace()


#reset 
# for i in range(len(hasil)):
# 	cmd = "UPDATE raw_data SET level = %s WHERE id_soal = %s"
# 	val = ("Medium",(i+1))
# 	kursor.execute(cmd,val)
# 	mydb.commit()