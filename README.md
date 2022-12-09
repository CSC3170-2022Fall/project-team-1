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

<!-- TODO -->

### Function Points (Temporary)

- The following are fixed (unchangable by consumers or plant owners):
	- Possible operations: 
		- design-import_A, etch_A, bond_A, drill_A, test_A
		- design-import_B, etch_B, bond_B, drill_B, test_B
		- design-import_C, etch_C, bond_C, drill_C, test_C
	- Possible chip types: chip_A, chip_B, chip_C
- What consumers can do:
	- Log in
	- Appoint plants for configurable packages
- What plant owners can do:
	- Log in
	- Publish machines
	- Accept appointments
- What everybody can see:
	- Chip type introduction (different chip types have different operation precedency) 
	- Plant information (machines)
	- Plants' machine information (feasibility, time, and expense on every possible operation)
	- Packages in the market (with their information: time budget, expense budget, and consumer name)
	- Processing record (visualization; start time, end time, and expense)
