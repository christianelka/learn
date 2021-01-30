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
# >>> date2 = dt.strptime(selesai,'%H:%M:%S')

def huruf(nilai, time):
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


cmd = "SELECT nilai, waktu_mulai, waktu_selesai FROM hasil "
res = kursor.execute(cmd)

data = kursor.fetchall()
# print(data)
# for data in ress:
for i in range(len(data)):
	nilai = data[i][0]
	mulai = dt.strptime(str(data[i][1]),"%Y-%m-%d %H:%M:%S")
	selesai = dt.strptime(str(data[i][2]),"%Y-%m-%d %H:%M:%S")
	selisih = selesai-mulai

	new = huruf(nilai, selisih)

	cmd = "UPDATE hasil SET nilai_huruf = %s, waktu_huruf = %s WHERE id = %s"
	val = (new[0],new[1],i+1)
	kursor.execute(cmd,val)
	mydb.commit()

	print(f"{nilai}; {selisih}; {new}")


# print(ress)