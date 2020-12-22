import mysql.connector

with open('panel/data_summary.txt','r') as s:
	summ = [k.strip() for k in s]
with open('panel/data_raw.txt','r') as s:
	raw = [k.strip() for k in s]

# print(summ,raw)

mydb = mysql.connector.connect(
  host="localhost",
  user="root",
  password="",
  database="learn"
)

curs = mydb.cursor()
# print(summ)
# print(raw)
for i in range(len(raw)):
	# cmd = "INSERT INTO raw_data(text,summarized) VALUES (%s,%s)"
	cmd = "INSERT INTO soal(isi_soal, answer, level) VALUES(%s,%s,%s)"
	value = (raw[i],summ[i],"MEDIUM")
	curs.execute(cmd,value)
	mydb.commit()
	print(i, "Saved")