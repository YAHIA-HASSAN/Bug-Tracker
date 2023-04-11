CREATE TABLE projects(
            prj_id int NOT NULL,
            prj_name VARCHAR(100) NOT NULL,
            prj_description VARCHAR(500),
            PRIMARY KEY (prj_id)
            );
CREATE TABLE usrs(
            usr_id int NOT NULL,
            usr_name VARCHAR(100) NOT NULL,
            usr_username VARCHAR(100) NOT NULL,
            usr_pass VARCHAR(50) NOT NULL,
            job_title VARCHAR(100) ,
            prj_id int NOT NULL,
            PRIMARY KEY (usr_id),
            FOREIGN KEY (prj_id) REFERENCES projects(prj_id)
            );
CREATE TABLE usrs_working_on_bugs(
            bug_id int not null,
            usr_id int NOT NULL,
            PRIMARY KEY (bug_id),
            FOREIGN KEY (usr_id) REFERENCES usrs(usr_id)
            );
            
CREATE TABLE bugs(
            	bug_id	INT not null,
                usr_add_id	INT not null,
            	bug_name	VARCHAR(100) not null,
            	bug_type	VARCHAR(100) not null,
             	bug_description	VARCHAR(500),
            	Priorty	INT not null,
            	status	INT not null,
            	prj_id	INT not null,
                PRIMARY KEY (bug_id),
                FOREIGN KEY (usr_add_id) REFERENCES usrs(usr_id),
                FOREIGN KEY (prj_id) REFERENCES projects(prj_id)
            );
CREATE TABLE processes(
            process_id int not null,
            process_time DATE not null,
            process_description	VARCHAR(500) not null,
            bug_id int not null,
            usr_id int NOT NULL,
            PRIMARY KEY (process_id),
            FOREIGN KEY (usr_id) REFERENCES usrs(usr_id),
            FOREIGN KEY (bug_id) REFERENCES bugs(bug_id)
            );