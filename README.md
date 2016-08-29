# Enroll Admission System
******
* Translate to EN on Aug 29, 2016. 
* Original Version on Sep 10, 2015.

## Simulation Function

* After initialisation, click **初号机(First Round Simulation)** in **状态管理(State Management)** 

* Then, click **以中文基准神经连接(Transfer Databases)** in **全局不可逆控制(Global Control)**

## Deployment
* Initial System

    * Need manually operations

    **Setup Database**

    * `mysql> source database.sql`

    **Modify DB Connection Configurations**

    * Change setting in *[EAS PATH]/Application/Home/Conf/config.php*

    * Replace all `M('', 'enroll2015_application', '');` by `M('enroll2015_application');`; These codes are included only in **IndexController.php**

    **Initial Setting**

	* Set `status_round` to **1** in table `STATUS_ROUND` by `INSERT INTO status_round VALUES(1, 1);`

	* Register **administrator** in table `users` by `INSERT INTO users VALUES(1, 'username', 'password', 'email', 'sector_id', 16);`

    **FIELD** REF: enroll_admission_db_segment_def.md

    **ISSUE** REF: issue.md

<br />

- 2015-2016 Fall/Winter Department (In Management System)

    * Table **Sectors**
    	* 1 - 电视台 - television
    	* 2 - 广播台 - radio
    	* 3 - 校报社 - newspaper

## Other
- Rule of Formal Serial Number

	**SerialNumber Rule: YYYY--M---stMDudenDH--HItn---u--mISS----**

		//$serialDate = "YYYYMMDDHHIISS";
		YYYY-M-MD-DH-HI-ISS			//2015-0-81-01-21-010

		//$stuId = "studentnum";
    	st-uden-tn-u-m				//31-3000-07-3-8
    	
    	//'-' means a random char
