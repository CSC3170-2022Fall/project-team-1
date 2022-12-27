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
| 120090011  | 王广 🚩       | ary.dinesen@icloud.com      | arydinesen      |
| 120090410  | 颜钰劼        | 120090410@link.cuhk.edu.cn  | ZYPRESSEN000    |
| 120090843  | 郭好          | 726827048@qq.com            | Annaaaa997      |
| 120090644  | 乔雨柔        | 120090644@link.cuhk.edu.cn | 120090644        |
| 120090327  | 宫燕亮        | gongdashhuai@gmail.com     | michaelGGGL      |
| 120090543  | 谭金镇        | 342335897@qq.com           | yishan-13        |

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
 - Visualization: 乔雨柔，王广，郭好
 - Presentation
	- Script: 王广
	- Website Demo: 
	- Slides: 颜钰劼
	- Voice Recorded: 
 - Report
	- Directory Structure Explanation: 郭好, 王广
	- Difficulties Encountered & Solutions: 
	- Historical Progress: 颜钰劼, 王广

## Implemented Functions

- Chip models, operation types are fixed in this project (unchangeable by consumers or plant owners).
	- Possible chip models: i5, i7, i9.
	- Possible operation types: Each chip model has its own version of "design-import, etch, bond, drill, test" so totally 15 operation types.
- What consumers can do:
	- Sign up and sign in.
	- Appoint plants for configurable packages.
- What plant owners can do:
	- Sign up and sign in.
	- Publish new machine models.
	- Accept appointments.
- What everybody can see:
	- Chip model information.
	- Plant information (See their machines models' feasibility, time, and expense on every possible operation; available number of each machine model).
	- Processing records (Visualization––Gantt Chart) (Visualize the start and end time).
	- Processing information (Responsive tables) (See the time, expense, and machines related to the operations).

## Presentation

- Watch our presentation on [YouTube]() or [Bilibili]() for a quick introduction!
- Click [here]() for the slides.

## Database Design

<img width="972" alt="Screenshot 2022-12-11 at 14 31 29" src="https://user-images.githubusercontent.com/90801772/206889785-1ef4b8d8-0247-4211-b135-7b6d78c353df.png">

See also [the history of the database design](database/history-of-database-design.md).

## Program Design

## Directory Structure Explanation

- [assets](assets)
	- JavaScript and CSS files here are used in the source code.
- [frontend](frontend)
	- [shared](shared)
		- Since some webpages share the same UI, putting it in a single file and `require`ing it from those webpages makes us easier to modify the UI code and maintain its consistency.
	- [single](shared)
		- Every frontend file here is only `reuiqre`d by a single PHP file.
- [database](database)
	- [initializaiton.sql](database/initialization.sql): The file was executed upon creating the database in [index.php](index.php). It creates all tables and inserts the default chip models and their operations.
	- [history-of-database-design.md](database/history-of-database-design.md): The file shows how we get the current database design from scrath.
- PHP files begginning with `c-` are webpages for consumers, while `p-` are for plant owners.

## Difficulties Encountered & Solutions

## How to Execute

1. Install an AMP package such as [XAMPP](https://www.apachefriends.org).
2. Start a MySQL/MariaDB server and an Apache web server in the AMP.
3. Download and move this repository to the location of your web server (For XAMPP, it's `xamppfiles/htdocs`).
4. Visit http://localhost/project-team-1-main on your browser (The code has been designed to create the database automatically when you visit [index.php](index.php) for the first time so you don't have to do so manually).
5. To test all functions of the program, follow the steps: Publish machines as a plant owner, appoint plants as a consumer, accept the appointments as a plant owner, and then check the database:
	- Easier way: Check the these webpages: Plant Information, Processing Records, and Processing Information.
	- More fundamental way: Check your database (If you have phpMyAdmin installed, you may do so in a GUI way by visiting http://localhost/phpmyadmin).

## Historical Progress

- Nov 23, 2022
	- Initial commit
	- Setting up Github Classroom Feedback
- Nov 26, 2022
	- Add member information
- Dec 5, 2022
	- Start database design
- Dec 6, 2022
	- Database redesign
- Dec 7, 2022
	- Database redesign
	- Add `index.php`
- Dec 9, 2022
	- Database redesign
	- Strat: initialize database with `database/initialization.sql`
	- Start: signup and signin
	- Start: consumer appointment
- Dec 10, 2022
	- Start: plant accept
- Dec 11, 2022
	- Start: plant publish
	- Add `assets/bootstrap/bootstrap.min.css`, `assets/bootstrap/bootstrap.min.js`, `assets/fonts/ionicons.eot`, `assets/fonts/ionicons.min.css`, `assets/fonts/ionicons.svg`, `assets/fonts/ionicons.ttf`, `assets/fonts/ionicons.woff`, `assets/js/theme.js`
	- Add `images/avatars/avatar.jpg`, `images/index/i5.jpg`, `images/index/i7.jpg`, `images/index/i9.jpg`, `images/nature/image1.jpg`, `images/nature/image2.jpg`, `images/nature/image3.jpg`, `images/nature/image4.jpg`, `images/nature/image5.jpg`, `images/nature/image6.jpg`, `images/nature/image7.jpg`, `images/nature/image8.jpg`, `images/nature/image9.jpg`, `images/tech/image4.jpg`, `images/tech/image6.png`
- Dec 12, 2022
	- Add `assets/css/app.min.css`, `assets/css/bootstrap-datepicker.min.css`, `assets/css/bootstrap-editable.css` and so on
	- Start: chip model info
	- Start: processing records
	- Start: using a shared home and signup/signin webpage
- Dec 13-23, 2022
	- Backend: Add functions and fix bugs
	- Frontend: Improve the appearance
- Dec 24, 2022
	- Start: processing information
- Dec 25, 2022
	- Fix bugs
- Dec 26, 2022
	- Start to prepare for the presentation
	- Start to prepare for the report
	- Improvement of the frontend
- Dec 27, 2022
	- Fix bugs of backend and frontend
	- Version 1.0 finished
	- Work on the presentation
	- Work on the report
- Dec 28, 2022
	- Finish presentation
	- Finish report
