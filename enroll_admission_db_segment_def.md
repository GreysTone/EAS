#Enroll Admission System DB Schema
* Each field in each table.
* Translate in EN on Aug 29, 2016.

## Users
- uid			***int***
- username		***varchar(255)***
- password		***varchar(255)***
- email			***varchar(255)***
- sector		***int***
- authority		***int***
	- 0x00 Unknown  
    - 0x01 Check-In
	- 0x02 Allocator
	- 0x03 Public Screen
	- 0x04 Interviewer
	- 0x08 Main Interviewer
	- 0x10 Administrator

## STATUS_ROUND
- id
	- 0x01 ROUND （It has a constant 1, helping back-end to modify data）
- round
	- 0x00 Unknown
	- 0x01 Waiting For Enrollment
	- 0x02 First Round Enrollment
	- 0x06 Second Round Enrollment
	- 0x0E End of Enrollment
	- 0xFE First Round Simulation(254)
	- 0xFF Second Round Simulation(255)

## Interviewees
- studentId		***varchar***
- serialNumber	***varchar*** Formal SN（40-digit SN）
- serialDigit 	***varchar*** Record SN（5-digit random char）
- status		***int***
	- 0x00 Unknown
	- 0x01 Waiting for first check-in, submitted interviewee's info
	- 0x02 Give-up（unused）
	- 0x04 Waiting for *First Round Enrollment*; already first checked-in
	- 0x08 Taking *First Round Enrollment*
    - 0x0C Waiting for second check-in; passed *First Round Enrollment*
	- 0x10 Waiting for *Second Round Enrollment*; already second checked-in	- 0x20 Taking *Second Round Enrollment*
	- 0x40 Refused
	- 0x80 Enrolled
- time1tid		***int***
- time2tid		***int***
- checkInTime	***varchar(255)***
- multiSector	***int***
	- 0x00 Unknown
	- 001 电视台
	- 010 广播台
	- 011 电视台 广播台
	- 100 校报社
	- 101 电视台 校报社
	- 110 广播台 校报社
	- 111 电视台 广播台 校报社

## Rates
- studentId		***int***
- serialNumber	***varchar(255)***
- uid			***int***
- round			***int***
- sector		***int***
- rating		***int*** *# 5-Rate*

## Comments
- studentId		***int***
- serialNumber	***varchar(255)***
- uid			***int***
- round			***int***
- sector		***int***
- comments		***varchar(255)***

## Tags
- studentId		***int***
- serialNumber	***varchar(255)***
- uid			***int***
- round			***int***
- sector		***int***
- tags			***varchar(255)***

## Tags_meta
- tagid			***int***
- description	***varchar(255)***

## Rooms
- rid			***int***
- roomnumber	***varchar(10)*** *# 607-2*
- roomstatus	***int***
	- 0x00 Unknown
	- 0x01 Empty，Could allocate a interview
	- 0x02 Non-empty
- sector		***int***
- gid			***int***
- susr_count	***int***
	`Count for Interviewee`
- suid_core		***int***
	`Main Interviewer`
- suid			***int***
	`At most, allow 12+1 in 1 room`

## Groups
- gid			***int***
- round			***int***
- member_sn		***varchar(255)***
	`At most, allow 10 interviewees in 1 group`

## Times
- tid			***int***
- dateSpec		***varchar(255)***
- timeSpec		***varchar(255)***
- description	***varchar(255)***

## Sectors
- sid			***int***
- description	***varchar(255)***

## Waiting_List
- studentId		***int***
- serialNumber	***varchar(255)***
- status		***int***
	- 0x00 Unknown
	- 0x01 Empty，Could be arranged in a interview
	- 0x02 Locked，Cannot be arranged in a interview

---

# Unused Table

## Logs
- lid			***int***
- uid 			***int*** *# relevant user*
- request		***varchar(255)*** *# system request(login logout..)*
- date			***varchar(255)***
- time			***varchar(255)***
`CREATE TABLE IF NOT EXISTS logs(
	lid int NOT NULL PRIMARY KEY AUTO_INCREMENT,
	uid int NOT NULL,
	request varchar(255) NOT NULL,
	date varchar(255) NOT NULL,
	time varchar(255) NOT NULL
);`

## Interviews
- iid			***int*** *# Auto Increcement*
- rid			***int***
- sector		***int***
- date			***varchar(255)***
- beginTime		***varchar(255)***
- stopTime		***varchar(255)***

`CREATE TABLE IF NOT EXISTS interviews(
	iid int NOT NULL PRIMARY KEY AUTO_INCREMENT,
	rid int NOT NULL,
	sector int NOT NULL,
	date varchar(255) NOT NULL,
	beginTime varchar(255) NOT NULL,
	stopTime varchar(255) NOT NULL
);`

## Settings
`CREATE TABLE IF NOT EXISTS settings(
	id int NOT NULL PRIMARY KEY AUTO_INCREMENT,
	key varchar(100) NOT NULL,
	val varchar(100) NOT NULL
);`
