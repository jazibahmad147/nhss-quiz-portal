

CREATE TABLE `classes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

INSERT INTO classes VALUES("1","One","1");
INSERT INTO classes VALUES("2","Two","1");
INSERT INTO classes VALUES("3","Three","1");
INSERT INTO classes VALUES("4","Four","1");
INSERT INTO classes VALUES("5","Five","1");
INSERT INTO classes VALUES("6","Six","1");
INSERT INTO classes VALUES("7","Seven","1");
INSERT INTO classes VALUES("8","Eight","1");
INSERT INTO classes VALUES("9","Nine","1");
INSERT INTO classes VALUES("10","Ten","1");



CREATE TABLE `priorities` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lowMCQ` int(11) NOT NULL,
  `moderateMCQ` int(11) NOT NULL,
  `highMCQ` int(11) NOT NULL,
  `lowCRQ` int(11) NOT NULL,
  `moderateCRQ` int(11) NOT NULL,
  `highCRQ` int(11) NOT NULL,
  `lowERQ` int(11) NOT NULL,
  `moderateERQ` int(11) NOT NULL,
  `highERQ` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

INSERT INTO priorities VALUES("1","3","2","0","3","2","0","2","0","0","Low");
INSERT INTO priorities VALUES("2","2","2","1","2","2","1","1","1","0","Moderate");
INSERT INTO priorities VALUES("3","0","2","3","0","2","3","0","1","1","High");



CREATE TABLE `questions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `classId` int(11) NOT NULL,
  `subjectId` int(11) NOT NULL,
  `chapter` int(11) NOT NULL,
  `topic` text NOT NULL,
  `question` text NOT NULL,
  `type` varchar(255) NOT NULL,
  `priority` varchar(255) NOT NULL,
  `opt1` varchar(255) NOT NULL,
  `opt2` varchar(255) NOT NULL,
  `opt3` varchar(255) NOT NULL,
  `opt4` varchar(255) NOT NULL,
  `userId` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `status` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=102 DEFAULT CHARSET=utf8mb4;

INSERT INTO questions VALUES("3","6","1","1","1.1","Six Computer Science 1 1.1 CRQ 1 Moderate","CRQ","Moderate","","","","","1","2023-01-27 18:22:30","1");
INSERT INTO questions VALUES("4","6","1","1","1.1","Six Computer Science 1 1.1 CRQ 2 Moderate","CRQ","Moderate","","","","","1","2023-01-27 18:23:30","1");
INSERT INTO questions VALUES("5","6","1","1","1.1","Six Computer Science 1 1.1 CRQ 3 Moderate","CRQ","Moderate","","","","","1","2023-01-27 18:24:09","1");
INSERT INTO questions VALUES("6","6","1","1","1.2","Six Computer Science 1 1.2 CRQ 4 Moderate","CRQ","Moderate","","","","","1","2023-01-27 18:24:44","1");
INSERT INTO questions VALUES("7","6","1","1","1.2","Six Computer Science 1 1.2 CRQ 5 Moderate","CRQ","Moderate","","","","","1","2023-01-27 18:25:02","1");
INSERT INTO questions VALUES("8","6","1","1","1.2","Six Computer Science 1 1.2 CRQ 6 Moderate","CRQ","Moderate","","","","","1","2023-01-27 18:25:19","1");
INSERT INTO questions VALUES("9","6","1","1","1.3","Six Computer Science 1 1.3 CRQ 7 Moderate","CRQ","Moderate","","","","","1","2023-01-27 18:25:46","1");
INSERT INTO questions VALUES("10","6","1","1","1.3","Six Computer Science 1 1.3 CRQ 8 Moderate","CRQ","Moderate","","","","","1","2023-01-27 18:26:05","1");
INSERT INTO questions VALUES("11","6","1","1","1.3","Six Computer Science 1 1.3 CRQ 9 Moderate","CRQ","Moderate","","","","","1","2023-01-27 18:26:25","1");
INSERT INTO questions VALUES("12","6","1","1","1.4","Six Computer Science 1 1.4 CRQ 10 Low","CRQ","Low","","","","","1","2023-01-27 18:27:07","1");
INSERT INTO questions VALUES("13","6","1","1","1.4","Six Computer Science 1 1.4 CRQ 11 Low","CRQ","Low","","","","","1","2023-01-27 18:27:35","1");
INSERT INTO questions VALUES("14","6","1","1","1.4","Six Computer Science 1 1.4 CRQ 12 Low","CRQ","Low","","","","","1","2023-01-27 18:28:01","1");
INSERT INTO questions VALUES("15","6","1","1","1.5","Six Computer Science 1 1.5 CRQ 13 High","CRQ","High","","","","","1","2023-01-27 18:29:12","1");
INSERT INTO questions VALUES("16","6","1","1","1.5","Six Computer Science 1 1.5 CRQ 14 High","CRQ","High","","","","","1","2023-01-27 18:29:28","1");
INSERT INTO questions VALUES("17","6","1","1","1.5","Six Computer Science 1 1.5 CRQ 15 High","CRQ","High","","","","","1","2023-01-27 18:29:45","1");
INSERT INTO questions VALUES("18","6","1","1","1.5","Six Computer Science 1 1.5 CRQ 16 High","CRQ","High","","","","","1","2023-01-27 18:30:03","1");
INSERT INTO questions VALUES("19","6","1","1","1.1","Six Computer Science 1 1.1 ERQ 17 High","ERQ","High","","","","","1","2023-01-27 18:30:33","1");
INSERT INTO questions VALUES("20","6","1","1","1.2","Six Computer Science 1 1.2 ERQ 18 Moderate","ERQ","Moderate","","","","","1","2023-01-27 18:31:05","1");
INSERT INTO questions VALUES("21","6","1","1","1.3","Six Computer Science 1 1.3 ERQ 19 Low","ERQ","Low","","","","","1","2023-01-27 18:31:46","1");
INSERT INTO questions VALUES("22","6","1","1","1.4","Six Computer Science 1 1.4 ERQ 20 Moderate","ERQ","Moderate","","","","","1","2023-01-27 18:32:20","1");
INSERT INTO questions VALUES("23","6","1","1","1.5","Six Computer Science 1 1.5 ERQ 21 Moderate","ERQ","Moderate","","","","","1","2023-01-27 18:32:49","1");
INSERT INTO questions VALUES("24","6","1","1","1.2","Six Computer Science 1 1.2 ERQ 22 High","ERQ","High","","","","","1","2023-01-27 18:41:34","1");
INSERT INTO questions VALUES("25","6","1","1","1.3","Six Computer Science 1 1.3 ERQ 23 High","ERQ","High","","","","","1","2023-01-27 18:42:42","1");
INSERT INTO questions VALUES("26","6","1","1","1.4","Six Computer Science 1 1.4 ERQ 24 Low","ERQ","Low","","","","","1","2023-01-27 18:43:02","1");
INSERT INTO questions VALUES("27","6","1","1","1.5","Six Computer Science 1 1.5 ERQ 25 Low","ERQ","Low","","","","","1","2023-01-27 18:43:30","1");
INSERT INTO questions VALUES("28","6","1","1","1.1","Six Computer Science 1 1.1 MCQ 26 Low","MCQ","Low","Option 1","Option 2","Option 3","Option 4","1","2023-01-27 18:45:01","1");
INSERT INTO questions VALUES("29","6","1","1","1.1","Six Computer Science 1 1.1 MCQ 27 High","MCQ","High","Option 1","Option 2","Option 3 ","Option 4","1","2023-01-27 18:45:35","1");
INSERT INTO questions VALUES("30","6","1","1","1.1","Six Computer Science 1 1.1 MCQ 28 Moderate","MCQ","Moderate","Option 1","Option 2","Option 3","Option 4","1","2023-01-27 18:46:05","1");
INSERT INTO questions VALUES("31","6","1","1","1.1","Six Computer Science 1 1.1 MCQ 29 Moderate","MCQ","Moderate","Option 1","Option 2","Option 3","Option 4","1","2023-01-27 18:46:45","1");
INSERT INTO questions VALUES("32","6","1","1","1.1","Six Computer Science 1 1.1 MCQ 30 Moderate","MCQ","Moderate","Option 1","Option 2","Option 3","Option 4","1","2023-01-27 18:47:11","1");
INSERT INTO questions VALUES("33","6","1","1","1.1","Six Computer Science 1 1.1 MCQ 31 Moderate","MCQ","Moderate","Option 1","Option 2","Option 3","Option 4","1","2023-01-27 18:47:50","1");
INSERT INTO questions VALUES("34","6","1","1","1.1","Six Computer Science 1 1.1 MCQ 32 Moderate","MCQ","Moderate","Option 1","Option 2","Option 3","Option 4","1","2023-01-27 18:48:59","1");
INSERT INTO questions VALUES("35","6","1","1","1.1","Six Computer Science 1 1.1 MCQ 33 Moderate","MCQ","Moderate","Option 1","Option 2","Option 3","Option 4","1","2023-01-27 18:49:32","1");
INSERT INTO questions VALUES("69","6","1","2","2.1","Six Computer Science 2 2.1 CRQ 1 Moderate","CRQ","Moderate","","","","","1","2023-01-28 10:15:19","1");
INSERT INTO questions VALUES("70","6","1","2","2.1","Six Computer Science 2 2.1 CRQ 2 Moderate","CRQ","Moderate","","","","","1","2023-01-28 10:15:19","1");
INSERT INTO questions VALUES("71","6","1","2","2.1","Six Computer Science 2 2.1 CRQ 3 Moderate","CRQ","Moderate","","","","","1","2023-01-28 10:15:19","1");
INSERT INTO questions VALUES("72","6","1","2","2.2","Six Computer Science 2 2.2 CRQ 4 Moderate","CRQ","Moderate","","","","","1","2023-01-28 10:15:19","1");
INSERT INTO questions VALUES("73","6","1","2","2.2","Six Computer Science 2 2.2 CRQ 5 Moderate","CRQ","Moderate","","","","","1","2023-01-28 10:15:19","1");
INSERT INTO questions VALUES("74","6","1","2","2.2","Six Computer Science 2 2.2 CRQ 6 Moderate","CRQ","Moderate","","","","","1","2023-01-28 10:15:19","1");
INSERT INTO questions VALUES("75","6","1","2","2.3","Six Computer Science 2 2.3 CRQ 7 Moderate","CRQ","Moderate","","","","","1","2023-01-28 10:15:19","1");
INSERT INTO questions VALUES("76","6","1","2","2.3","Six Computer Science 2 2.3 CRQ 8 Moderate","CRQ","Moderate","","","","","1","2023-01-28 10:15:19","1");
INSERT INTO questions VALUES("77","6","1","2","2.3","Six Computer Science 2 2.3 CRQ 9 Moderate","CRQ","Moderate","","","","","1","2023-01-28 10:15:19","1");
INSERT INTO questions VALUES("78","6","1","2","2.4","Six Computer Science 2 2.4 CRQ 10 Low","CRQ","Low","","","","","1","2023-01-28 10:15:19","1");
INSERT INTO questions VALUES("79","6","1","2","2.4","Six Computer Science 2 2.4 CRQ 11 Low","CRQ","Low","","","","","1","2023-01-28 10:15:19","1");
INSERT INTO questions VALUES("80","6","1","2","2.4","Six Computer Science 2 2.4 CRQ 12 Low","CRQ","Low","","","","","1","2023-01-28 10:15:19","1");
INSERT INTO questions VALUES("81","6","1","2","2.5","Six Computer Science 2 2.5 CRQ 13 High","CRQ","High","","","","","1","2023-01-28 10:15:19","1");
INSERT INTO questions VALUES("82","6","1","2","2.5","Six Computer Science 2 2.5 CRQ 14 High","CRQ","High","","","","","1","2023-01-28 10:15:19","1");
INSERT INTO questions VALUES("83","6","1","2","2.5","Six Computer Science 2 2.5 CRQ 15 High","CRQ","High","","","","","1","2023-01-28 10:15:19","1");
INSERT INTO questions VALUES("84","6","1","2","2.5","Six Computer Science 2 2.5 CRQ 16 High","CRQ","High","","","","","1","2023-01-28 10:15:19","1");
INSERT INTO questions VALUES("85","6","1","2","2.1","Six Computer Science 2 2.1 ERQ 17 High","ERQ","High","","","","","1","2023-01-28 10:15:19","1");
INSERT INTO questions VALUES("86","6","1","2","2.2","Six Computer Science 2 2.2 ERQ 18 Moderate","ERQ","Moderate","","","","","1","2023-01-28 10:15:19","1");
INSERT INTO questions VALUES("87","6","1","2","2.3","Six Computer Science 2 2.3 ERQ 19 Low","ERQ","Low","","","","","1","2023-01-28 10:15:19","1");
INSERT INTO questions VALUES("88","6","1","2","2.4","Six Computer Science 2 2.4 ERQ 20 Moderate","ERQ","Moderate","","","","","1","2023-01-28 10:15:19","1");
INSERT INTO questions VALUES("89","6","1","2","2.5","Six Computer Science 2 2.5 ERQ 21 Moderate","ERQ","Moderate","","","","","1","2023-01-28 10:15:19","1");
INSERT INTO questions VALUES("90","6","1","2","2.2","Six Computer Science 2 2.2 ERQ 22 High","ERQ","High","","","","","1","2023-01-28 10:15:19","1");
INSERT INTO questions VALUES("91","6","1","2","2.3","Six Computer Science 2 2.3 ERQ 23 High","ERQ","High","","","","","1","2023-01-28 10:15:19","1");
INSERT INTO questions VALUES("92","6","1","2","2.4","Six Computer Science 2 2.4 ERQ 24 Low","ERQ","Low","","","","","1","2023-01-28 10:15:19","1");
INSERT INTO questions VALUES("93","6","1","2","2.5","Six Computer Science 2 2.5 ERQ 25 Low","ERQ","Low","","","","","1","2023-01-28 10:15:19","1");
INSERT INTO questions VALUES("94","6","1","2","2.1","Six Computer Science 2 2.1 MCQ 26 Moderate","MCQ","Moderate","Option 1","Option 2","Option 3","Option 4","1","2023-01-28 10:15:19","1");
INSERT INTO questions VALUES("95","6","1","2","2.1","Six Computer Science 2 2.1 MCQ 27 Moderate","MCQ","Moderate","Option 1","Option 2","Option 3 ","Option 4","1","2023-01-28 10:15:19","1");
INSERT INTO questions VALUES("96","6","1","2","2.1","Six Computer Science 2 2.1 MCQ 28 Moderate","MCQ","Moderate","Option 1","Option 2","Option 3","Option 4","1","2023-01-28 10:15:19","1");
INSERT INTO questions VALUES("97","6","1","2","2.1","Six Computer Science 2 2.1 MCQ 29 Low","MCQ","Low","Option 1","Option 2","Option 3","Option 4","1","2023-01-28 10:15:19","1");
INSERT INTO questions VALUES("98","6","1","2","2.1","Six Computer Science 2 2.1 MCQ 30 Moderate","MCQ","Low","Option 1","Option 2","Option 3","Option 4","1","2023-01-28 10:15:20","1");
INSERT INTO questions VALUES("99","6","1","2","2.1","Six Computer Science 2 2.1 MCQ 31 Low","MCQ","Moderate","Option 1","Option 2","Option 3","Option 4","1","2023-01-28 10:15:20","1");
INSERT INTO questions VALUES("100","6","1","2","2.1","Six Computer Science 2 2.1 MCQ 32 High","MCQ","High","Option 1","Option 2","Option 3","Option 4","1","2023-01-28 10:15:20","1");
INSERT INTO questions VALUES("101","6","1","2","2.1","Six Computer Science 2 2.1 MCQ 33 High","MCQ","High","Option 1","Option 2","Option 3","Option 4","1","2023-01-28 10:15:20","1");



CREATE TABLE `subjects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

INSERT INTO subjects VALUES("1","Computer Science","1");
INSERT INTO subjects VALUES("2","English","1");
INSERT INTO subjects VALUES("3","Urdu","1");
INSERT INTO subjects VALUES("4","Math","1");
INSERT INTO subjects VALUES("5","Social Studies","1");
INSERT INTO subjects VALUES("6","Islamiyat","1");
INSERT INTO subjects VALUES("7","Science","1");



CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

INSERT INTO users VALUES("1","Jazib Ahmad","jazib.ahmad147@hotmail.com","32250170a0dca92d53ec9624f336ca24","0");

