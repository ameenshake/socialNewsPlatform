CREATE TABLE posts (postID INT NOT NULL AUTO_INCREMENT PRIMARY KEY, title VARCHAR(500) NOT NULL, link VARCHAR(500), content TEXT, image BLOB, username VARCHAR(200) NOT NULL, datePosted DATETIME NOT NULL);


CREATE TABLE users (username VARCHAR(200) NOT NULL PRIMARY KEY, fName VARCHAR(200) NOT NULL, lName VARCHAR(200) NOT NULL, pass CHAR(32) NOT NULL, email VARCHAR(80) NOT NULL);


CREATE TABLE comments (commentID INT NOT NULL AUTO_INCREMENT PRIMARY KEY, parentID INT, commentText TEXT, username VARCHAR(200) NOT NULL, datePosted DATETIME NOT NULL);


INSERT INTO posts (link, title, content, username, datePosted)
VALUES ('www.google.com',
        'Post Test',
        'I am a search engine used by millions daily.',
        'ameenshake',
        '2017-05-04 23:28:00');
