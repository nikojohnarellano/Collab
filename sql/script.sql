CREATE DATABASE Collab;
USE Collab;

CREATE TABLE IF NOT EXISTS User(
	UserId			INTEGER		PRIMARY KEY	 AUTO_INCREMENT,
  	FirstName 		VARCHAR(20) NOT NULL,
  	LastName 		VARCHAR(20) NOT NULL,
  	EmailAddress 	VARCHAR(50) NOT NULL,
  	Password 		VARCHAR(30) NOT NULL,
	ProgramLevel	INTEGER		NOT NULL,
	CstOption		VARCHAR(30) NOT NULL
);

CREATE TABLE IF NOT EXISTS Note(
	NoteId			INTEGER			PRIMARY KEY	 AUTO_INCREMENT,
  	Question 		VARCHAR(1000) 	NOT NULL,
  	Answer	 		VARCHAR(1000)  	NOT NULL,
	Category		VARCHAR(30)		NOT NULL,
  	Owner		 	INTEGER 		NOT NULL
);

CREATE TABLE IF NOT EXISTS Comment(
	CommentId		INTEGER			PRIMARY KEY	 AUTO_INCREMENT,
  	Content 		VARCHAR(1000) 	NOT NULL,
  	PostedBy	 	INTEGER 		NOT NULL,
	NoteId			INTEGER			NOT NULL,
);

INSERT INTO User (FirstName, LastName, EmailAddress, Password, ProgramLevel, CstOption)
	VALUES ("Niko", "Arellano", "njlarellano@my.bcit.ca", "winternear", "3", "Web and Mobile");