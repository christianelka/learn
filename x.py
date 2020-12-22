import mysql.connector as sql

# NIM, Latihan_ke, Text, U_Summary, S_Summary, Similarity, Tanggal
mydb = sql.connect(
  host="localhost",
  user="root",
  password="",
  database="learn"
)
kursor = mydb.cursor()

for i in range(510):
	cmd = 'UPDATE raw_data SET level = %s WHERE id_soal = %s'
	val = ('MEDIUM',i+1)
	kursor.execute(cmd,val)
	mydb.commit()
	print(i+1,' sukses')