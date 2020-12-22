# author @alfarkhan._

try:
	import mysql.connector as sql
except:
	import os
	os.system("pip install mysql-connector-python")
	os.system("cls")
	import mysql.connector as sql
import sys

class naive_bayes:

	def __init__(self):
		self.dbase = sql.connect(
			  host="localhost",
			  user="root",
			  password="",
			  database="naive"
			)
		self.dcurs = self.dbase.cursor()

		self.dcurs.execute("SELECT bobot_soal FROM data_training")
		self.BOBOT = self.dcurs.fetchall()

		self.dcurs.execute("SELECT level FROM data_training")
		self.LEVEL = self.dcurs.fetchall()

	def bobots(self):
		result = [k[0] for k in self.BOBOT]
		return result

	def level(self):
		result = [k[0] for k in self.LEVEL]
		return result

	def valBobot(self):
		count = {}
		for i in range(5):
			count[i+1] = round(self.bobots().count(i+1)/len(self.bobots()),3)

		return count

	def valLevel(self):
		count = {}
		for i in range(5):
			count[i+1] = round(self.level().count(i+1)/len(self.level()),3)

		return count

	def hitungBoth(self,kolom):
		self.dcurs.execute("SELECT {} FROM data_training".format(kolom))
		kode = self.dcurs.fetchall()
		kode.sort()

		# mencari bobot
		count_bobot = {}
		for data in kode:
			count_bobot[data[0]] = []

		for key,val in count_bobot.items():
			for i in range(5):
				command = "SELECT {} FROM data_training WHERE {} = %s AND bobot_soal = %s".format(kolom,kolom)
				self.dcurs.execute(command,(key,i+1))
				val.append(round(len(self.dcurs.fetchall())/self.bobots().count(i+1),3))

		# mencari level
		count_level = {}
		for data in kode:
			count_level[data[0]] = []

		for key,val in count_level.items():
			for i in range(5):
				command = "SELECT {} FROM data_training WHERE {} = %s AND level = %s".format(kolom,kolom)
				self.dcurs.execute(command,(key,i+1))
				val.append(round(len(self.dcurs.fetchall())/self.bobots().count(i+1),3))

		counter = [count_bobot,count_level]

		return counter

	def run(self,user,kode,nilai,waktu,latke):
		print(latke)
		kode_bys = self.hitungBoth("kode_soal")[0][kode]
		nilai_bys = self.hitungBoth("nilai_user")
		waktu_bys = self.hitungBoth("waktu")
		latke_bys = self.hitungBoth("latihan_ke")[1][latke]

		# bobot
		final = {"bobot":0,"level":0}
		counter = [[],[]]
		for i in range(5):
			counter[0].append(kode_bys[i]*nilai_bys[0][nilai][i]*waktu_bys[0][waktu][i]*self.valBobot()[i+1])
			counter[1].append(latke_bys[i]*nilai_bys[1][nilai][i]*waktu_bys[1][waktu][i]*self.valLevel()[i+1])

		final["bobot"] = counter[0].index(max(counter[0]))+1
		final["level"] = counter[1].index(max(counter[1]))+1

		cmd = 'INSERT INTO data_training(user_id, kode_soal, nilai_user, waktu, bobot_soal, latihan_ke, level) VALUES (%s,%s,%s,%s,%s,%s,%s)'
		val = (user,kode,nilai,waktu,final["bobot"],latke,final["level"])
		self.dcurs.execute(cmd,val)
		self.dbase.commit()

		return final

def run():
	main = naive_bayes()

	p = main.run(sys.argv[1],sys.argv[2],sys.argv[3],int(sys.argv[4]),int(sys.argv[5]))
	print("User  : ",sys.argv[1])
	print("Kode  : ",sys.argv[2])
	print("Nilai : ",sys.argv[3])
	print("Waktu : ",sys.argv[4])
	print("Bobot : ",p["bobot"])
	print("Latke : ",sys.argv[5])
	print("Level : ",p["level"])

if __name__ == "__main__":
	run()