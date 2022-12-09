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
| 120090644  | 乔雨柔         | 120090644@link.cuhk.edu.cn |                 |
| 120090327  | 宫燕亮         | gongdashhuai@gmail.com     | michaelGGGL     |
| 120090543  | 谭金镇         | 342335897@qq.com           | yishan-13        |

## Project Specification

<!-- You should remove the terms/sentence that is not necessary considering your option/branch/difficulty choice -->

After thorough discussion, our team made the choice and the specification information is listed below:

- Our option choice is: **Option 1**
- Our branch choice is: **Branch 1**
- The difficulty level is: **Normal**

## Project Abstract

## Database Design (Temporary)

<img width="1338" alt="Screenshot 2022-12-09 at 20 14 50" src="https://user-images.githubusercontent.com/90801772/206700404-a87fa8d5-431d-4972-80f7-8a0132e27ea3.png">

### Function Points (Temporary)

- The following are fixed (unchangable by consumers or plant owners):
	- Possible operation types: 
		- design-import i5, etch i5, bond i5, drill i5, test i5
		- design-import i7, etch i7, bond i7, drill i7, test i7
		- design-import i9, etch i9, bond i9, drill i9, test i9
	- Possible chip models: chip i5, chip i7, chip i9
- What consumers can do:
	- Register and log in
	- Appoint plants for configurable packages
- What plant owners can do:
	- Register and log in
	- Accept appointments
	- Publish machines 
- What everybody can see:
	- Chip model introduction (different chip models have different operations, which are of different types) 
	- Plant information (their machines models' feasibility, time, and expense on every possible operation; available number of each machine model)
	- Processing record (visualization; start time, end time, and expense) (display non-ending operations too)
