# task

Interview task :

School:
-	*School_name
-	*Year_founded
-	City

Teacher :
-	*First_name
-	*Last_name
-	*birth_date (Y-m-d)

fields with (*) are mandatory

Relation - Teacher contain school, so create relation between them (note : school is required for teacher)

SCHOOL TASKS:
Your task is to implement create and store action for School with backend validation.
1.	Create page - show Create School form with fields and submit button
2.	Store action - store new School on DB
3.	Index (Listing) Page -  show as table (School_name, Year_founded, City), 5 per page
4.	Delete action - remove School from database (Note: You shouldn't delete teachers which contain school that you deleted)

TEACHER TASKS:
Your task is to create full admin panel (CRUD) for Teacher with backend validation.
1.	Create page - show Create Teacher form with fields and submit button
2.	Store action - store new Teacher on DB - with selected school
3.	Edit page - show edit form
4.	Update action - update user
5.	Delete action - remove Teacher from database
6.	Index (Listing) Page - show as table (First_name, Last_name, Birth_date, School_name)
-	Listing Teachers (5 per page)
-	Filter on Index page : Add search field for filtering teachers by full name. If somebody insert text and hit the Search button you have to provide him filtered teachers per inserted text (Assume that user typing First Name and then Last name, respectively). 
Filter can be standard form request (ajax is not needed) and process it when somebody click Search button.

Note for validation messages: Print them wherever on page (below input fields or on the top). You don't have to style them.
