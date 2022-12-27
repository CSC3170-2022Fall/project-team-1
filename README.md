[![Open in Visual Studio Code](https://classroom.github.com/assets/open-in-vscode-c66648af7eb3fe8bc4f294546bfd86ef473780cde1dea487d3c4ff354943c9ae.svg)](https://classroom.github.com/online_ide?assignment_repo_id=9433693&assignment_repo_type=AssignmentRepo)
# CSC3170 Course Project

## Project Overall Description

This is our implementation for the course project of CSC3170, 2022 Fall, CUHK(SZ). For details of the project, you can refer to [project-description.md](project-description.md). In this project, we will utilize what we learned in the lectures and tutorials in the course, and implement either one of the following major jobs:

<!-- Please fill in "x" to replace the blank space between "[]" to tick the todo item; it's ticked on the first one by default. -->

- [x] **Application with Database System(s)**
- [ ] **Implementation of a Database System**

## Team Members 

Our team consists of the following members, listed in the table below (the team leader is shown in the first row, and is marked with 🚩 behind his/her name):

<!-- change the info below to be the real case -->

| Student ID | Student Name | GitHub Account (in Email)   | GitHub Username |
| ---------- | ------------ | --------------------------- | --------------- |
| 120090011  | 王广 🚩       | ary.dinesen@icloud.com      | arydinesen     |
| 120090410  | 颜钰劼        | 120090410@link.cuhk.edu.cn  | ZYPRESSEN000    |
| 120090843  | 郭好          | 726827048@qq.com            | Annaaaa997      |
| 120090644  | 乔雨柔         | 120090644@link.cuhk.edu.cn | 120090644       |
| 120090327  | 宫燕亮         | gongdashhuai@gmail.com     | michaelGGGL     |
| 120090543  | 谭金镇         | 342335897@qq.com           | yishan-13       |

## Project Specification

<!-- You should remove the terms/sentence that is not necessary considering your option/branch/difficulty choice -->

After thorough discussion, our team made the choice and the specification information is listed below:

- Our option choice is: **Option 1**
- Our branch choice is: **Branch 1**
- The difficulty level is: **Normal**

## Contribution (Temporary)

 - Database Design: 王广，颜钰劼
 - Frontend: 郭好，宫燕亮，王广，颜钰劼
 - Backend: 王广，宫燕亮
 - Visluzation: 乔雨柔，王广，郭好
 - Presentation
	- Script: 王广
	- Website Demo: 
	- Slides: 
	- Voice Recorded: 
 - Report
	- Directory Structure Explanation: 郭好
	- Difficulties Encountered & Solutions: 
	- Historical Progress: 颜钰劼

## How to Execute

1. Install an AMP package such as XAMPP.
2. Start a MySQL/MariaDB server and an Apache web server in the AMP.
3. Download and move this repository to the location of your web server (For XAMPP, it's `xamppfiles/htdocs`).
4. Visit `http://localhost/project-team-1-main` on your browser (The code has been designed to create the database automatically when you visit `index.php` for the first time so you don't have to do so manually).
5. To test all functions of the program, follow the steps: Publish machines as a plant owner, appoint plants as a consumer, accept the appointments as a plant owner, and then check the database:
	- Easier way: Check the these webpages: Plant Information, Processing Records, and Processing Information.
	- More fundamental way: Check your database (If you have phpMyAdmin installed, you may do so in a GUI way by visiting `http://localhost/phpmyadmin`).

## Database Design

<img width="972" alt="Screenshot 2022-12-11 at 14 31 29" src="https://user-images.githubusercontent.com/90801772/206889785-1ef4b8d8-0247-4211-b135-7b6d78c353df.png">

See also [the history of the database design](database/history-of-database-design.md).

## Implemented Functions

- Chip models, operation types are fixed in this project(unchangable by consumers or plant owners).
	- Possible chip models: i5, i7, i9
	- Possible operation types: Each chip model has its own version of "design-import, etch, bond, drill, test" so totally 15 operation types
- What consumers can do:
	- Sign in & Sign up & Sign out
	- Appoint plants for configurable packages
	- Check plant information.
	- Check processing records if there are any packages that have been accepted by plant owners (in responsive tables or visualized charts).
- What plant owners can do:
	- Sign in & Sign up & Sign out
	- Accept appointments
	- Publish machines information
	- Check processing records of the plant in responsive tables or visualized charts.
- What everybody can see:
	- Chip model introduction (different chip models have different operations, which are of different types)
	- Plant information (their machines models' feasibility, time, and expense on every possible operation; available number of each machine model)
	- Processing records (visualization; start time, end time, and expense) (display non-ending operations too)
	- Processing information (the time, expense, and machines related to the operations)

## Program Design

## Directory Structure Explanation
The following are the main structure of the directory:
- project-team-1
    - assets
        - Containing js and css files included in source code.
    - frontend
        - shared
          - Since some web pages share the same ui elements or page design, php files under this directory can share those part using require which can maintain code consistency.
        - single
          - Different from php in shared, files under this directory draw a distinction of frontend among web pages.
    - database
- index.php 
  - Home of the website.
- php files having names begginning with "c-"
  - Functional points for consumer.
- php files having names begginning with "p-"
  - Functional points for plant owner.
- signout.php
  - signout for both consumer and plant owner.

## Difficulties Encountered & Solutions

## Historical Progress

- Nov 23, 2022
	- Initial commit
	- Add online IDE url
	- Setting up Github Classroom Feedback
- Nov 26, 2022
	- Add member information
	- Update README.md
- Dec 5, 2022
	- Update README.md
- Dec 6, 2022
	- Update README.md
- Dec 7, 2022
	- Update README.md
	- Add files index images/firefox-icon.png, index.php, scripts/main.js, styles/style.css
- Dec 9, 2022
	- Update README.md
	- Delete chip-website directory
	- Update project-description.md
	- Delete consumer-appointment.php
	- Delete plant-home.php
	- Update consumer-home.php
	- Delete plant-home.php
	- Update consumer-appoint.php
	- Delete consumer-home.php
	- Update consumer-include.php, consumer-login-check.php, sql/initialization.sql
- Dec 10, 2022
	- Add files images/search.png, images/sp_car.png, styles/index.css
	- Update index.php, styles/style.css, consumer-login.php
	- Add flie styles/consumer-login.css
	- Update consumer-login.php, images/bg1.webp
	- Update consumer-appoint.php, consumer-include.php, sql/initialization.sql, styles/style.css
	- Update README.md
	- Add file ER2-2.erdplus
	- Update consumer-appoint.php, plant-accept.php, sql/draft.sql, sql/initialization.sql
	- Update README.md
- Dec 11, 2022
	- Update assets/bootstrap/bootstrap.min.css, assets/bootstrap/bootstrap.min.js, assets/fonts/ionicons.eot, assets/fonts/ionicons.min.css, assets/fonts/ionicons.svg, assets/fonts/ionicons.ttf, assets/fonts/ionicons.woff, assets/js/theme.js, index.php
	- Add files images/avatars/avatar.jpg, images/index/i5.jpg, images/index/i7.jpg, images/index/i9.jpg, images/nature/image1.jpg, images/nature/image2.jpg, images/nature/image3.jpg, images/nature/image4.jpg, images/nature/image5.jpg, images/nature/image6.jpg, images/nature/image7.jpg, images/nature/image8.jpg, images/nature/image9.jpg, images/tech/image4.jpg, images/tech/image6.png
	- Update index.php, plant-accept.php, sql/initialization.sql
	- Update README.md
	- Delete ER2-2.erdplus
	- Delete consumer-include.php
	- Delete consumer-login-check.php
	- Update consumer-appoint-include-form.php, consumer-appoint.php, consumer-login.php, consumer-register.php, index.php, plant-accept.php, plant-publish-include-form.php, plant-publish.php, sql/initialization.sql
	- Add plant-login.php, plant-register.php
	- Update consumer-login.php, consumer-register.php, plant-login.php, plant-register.php
- Dec 12, 2022
	- Update assets/css/app.min.css, assets/css/bootstrap-datepicker.min.css, assets/css/bootstrap-editable.css and so on
	- Update README.md, consumer-appoint.php, consumer-login.php, consumer-register.php, index.php, plant-accept.php, sql/initialization.sql
	- Delete ER2-2.erdplus, consumer-include.php, consumer-login-check.php
	- Add flies plant-login.php, plant-publish-include-form.php, plant-publish.php, plant-register.php
	- Update plant-publish.php
	- Update consumer-appoint.php, plant-publish.php
	- Update consumer-appoint.php
	- Delete consumer-appoint-include-form.php
	- Add flie chip-model-info.php
	- Add file process-records.php
	- Update README.md
	- Rename process-records.php to processing-records.php
	- Update chip-model-info.php
	- Rename plant-register.php to plant-signup.php
	- Rename consumer-register.php to consumer-signup.php
	- Rename plant-publish-include-form.php to plant-publish-form-included.php
	- Add flies consumer-appoint-form-included.php, login-signup-universal-frontend.php, plant-accept-form-included.php
	- Update consumer-appoint.php, consumer-login.php, consumer-signup.php, index.php, plant-accept.php, plant-login.php, plant-publish-form-included.php, plant-publish.php, plant-signup.php, processing-records.php
	- Update processing-records.php
- Dec 13, 2022
	- Update plant-accept-form-included.php, plant-accept.php, plant-publish-form-included.php, plant-publish.php
	- Update consumer-appoint-form-included.php, plant-publish-form-included.php, sql/initialization.sql
	- Delete draft.sql
	- Update consumer-appoint-form-included.php, consumer-appoint.php, plant-accept-form-included.php, plant-accept.php, plant-publish-form-included.php
- Dec 15, 2022
	- Update README.md
- Dec 22, 2022
	- Update README.md
- Dec 23, 2022
	- Update login-signup-universal-frontend.php
	- Update consumer-login.php 
	- Update consumer-signup.php
	- Update plant-login.php
	- Update Update plant-signup.php
- Dec 24, 2022
	- Update README.md

	
