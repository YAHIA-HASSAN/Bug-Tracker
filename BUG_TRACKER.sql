CREATE TABLE usrs(
            usr_id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
            usr_name VARCHAR(100) NOT NULL,
            usr_username VARCHAR(100) NOT NULL UNIQUE,
            usr_pass VARCHAR(50) NOT NULL,
            job_title VARCHAR(100)
            );
            
CREATE TABLE bugs(
            	bug_id	INT not null AUTO_INCREMENT PRIMARY KEY,
                usr_add_id	INT not null,
            	bug_title	VARCHAR(100) not null,
            	bug_type	VARCHAR(100) not null,
             	bug_description	VARCHAR(500),
            	Priorty	INT not null,
            	status	INT not null,
                FOREIGN KEY (usr_add_id) REFERENCES usrs(usr_id)
            );
CREATE TABLE usrs_working_on_bugs(
            bug_id int not null,
            usr_id int NOT NULL,
            FOREIGN KEY (bug_id) REFERENCES bugs(bug_id),
            FOREIGN KEY (usr_id) REFERENCES usrs(usr_id)
            );