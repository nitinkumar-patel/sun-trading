@ Nitinkumar

In the README.txt, this project includes the artifacts for the 2 tasks: 

----------------------------- 

Task-1: SQL Exercise

Please Open SQL_Exercise.txt 
----------------------------- 

Task-2: Development Exercise:

	for UNIX/LINUX environment:

	Execution steps:

	1. First resolve the dependencies by running the 'requirements.txt' through a packaging solution like pip.
	Command is 'pip install -r requirements.txt'

	[ Note: please make sure logs and db folder exist into SunTrading directory. if not please create it. Run following two command:
		mkdir db
		mkdir logs
		]

	2. Move to the “Main” folder. 

	3. Run the tradediff.py from the console.
		Command is 'python tradediff.py'

	4. Run the file setup.py:
		Using this command: "python setup.py sdist"

	5. A shareable package will be created into "dist" directory.

	6. It will also create "MANIFEST" file for the project

	7. The packaged solution can be privately shared which is available in the dist folder.

	8. To make the package publicly available, follow following steps.
		5.1. Run the command from console, 'python setup.py register'
		5.2. You will be given the following options.
			 1. use your existing login,
			 2. register as a new user,
			 3. have the server generate a new password for you (and email it to you), or
			 4. quit
			Select any one of them.

	9. You can also create a windows installable file using the setup.py. Run the below command to create a installable by the name 'bdist_wininst'.
		'python setup.py sdist bdist_wininst upload'
	
	10. the log file is created in the logs folder with the name trade_diff.log
		- at every low level operation, a log entry is appended to the log file

	11. The Final Result should be visible as Result.html

	12. The Final Result is also stored in "tradediff.db" file which is located in "SunTrading/db" directory. Also you will get result on console.

		steps for accessing database tradediff.db file into terminal: 
			12. 1. open different terminal
			12. 2. go to SunTrading/db directory
			12. 3. run command sqlite
					1. >> .open tradediff.db
					2. type sql query 
						>> SELECT * FROM tradediff
						Finally, you will get result of the table on console.
		

