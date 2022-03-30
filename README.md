# Schedulr
Schedulr is a CRUD web-app that is based on PHP. The following documentation will explain the workings of version 1 of the program, as well as some of the underlying code. I have planned a future iteration of this program that will be based on Python and will incorporate End-to-End Encryption, and also have a session manager, and also keylogging.
## Dashboard

![[Pasted image 20220329221154.png]]
When a user first logins into the system they are presented with the dashboard screen. On the dashboard screen the user can perform various actions relating to practice management.

In order to protect patient privacy, all screenshots will use names related to the NFL.
![[Pasted image 20220329214153.png]]

The main purpose of the dashboard for for report generation. A user can filter their reports in three main ways:
1. Facility
2. Provider
3. Date

By default the dashboard reports all activities for the current date.

### Filters
![[Pasted image 20220329214245.png]]
All patients that are listed under 'New England Patriots' will appear. Simply by selecting the dropdown, a user can filter by the name of the facility.
A user can add more facilities to the database by entering the 'Add Facility' page.

Similarly, a user can use multiple filters at once, simply by selecting other criteria.

### Generating Reports
![[Pasted image 20220329214903.png]]
By using the filters on the dashboard, a user can generate reports in the form of a pdf. This allows for easy sharing of information. For example, a provider can have easy access to their schedule, and where the patients they need to visit are, within the facility.

![[Pasted image 20220329215030.png]]
Additionally, practice managers can gain information relating to all practice wide activities, and gain insight on provider productivity. 
## Reschedule
![[Pasted image 20220329221241.png]]
One of the more powerful functions contained within the web application is the rescheduling page. On this page a user can batch select multiple patients and reschedule them. Additionally, a user can make updates to the schedule by changing the provider assigned or changing the date of the appointment.

![[Pasted image 20220329215349.png]]

![[Pasted image 20220329215423.png]]
Above, two patients have been assigned the provider 'Zarak' and are scheduled to be seen on March 31.

![[Pasted image 20220329215505.png]]

If 'Zarak' was not available for the date of the appoint, the patient can be assigned a different provider.
![[Pasted image 20220329215615.png]]
![[Pasted image 20220329215659.png]]


## Add Patient
![[Pasted image 20220329221326.png]]

![[Pasted image 20220329220047.png]]

If we look at the results of our reschedule function, we can see that the values for the patients have been updated in our database. We can additionally add more patients to the practice on our 'Add Patient' page.

![[Pasted image 20220329220302.png]]

We can add patient 'Chris Godwin' to be scheduled for 'March 31, 2022.' When we go on the dashboard page, we will see 'Chris Godwin' along with the other patients that have been scheduled for 'March 31, 2022.'

![[Pasted image 20220329220422.png]]

We can check the 'Patient' table, and see that 'Chris Godwin' has been added.
![[Pasted image 20220329220522.png]]
## Add Facility
![[Pasted image 20220329221403.png]]
Another 'Create' function. A user can fill out the form and they will be able to add another facility to the facility database.

![[Pasted image 20220329215818.png]]

In terms of the database structure, 'Miami Dolphins' are now added to the table 'facility'

![[Pasted image 20220329215944.png]]



## Add Provider

![[Pasted image 20220329221033.png]]
![[Pasted image 20220329220743.png]]
We can update the table 'Providers' on the 'Add a Provider' page, and filling out the information.

![[Pasted image 20220329220831.png]]

And we can see that the 'Providers' table has been updated to reflect the new information.
![[Pasted image 20220329220851.png]]
## Edit Patient
![[Pasted image 20220329221444.png]]

The 'Edit Patient' page allows users to correct any mistakes that may have occurred when originally entering the patient information. For example, assume that a patient has been assigned to wrong facility. The edit page allows a user to fix that.
![[Pasted image 20220329221605.png]]

We can see that 'Tom Brady' and 'Rob Gronkowski' have been assigned to the wrong facility. While they are originally located at 'New England Patriots' their facility now needs to be updated to 'Tampa Bay Buccaneers'.

![[Pasted image 20220329221735.png]]
The 'Edit' page is structured very similarly to the 'Add Patient' page. After the required changes have been made we can submit. And the patient profile will be updated.

![[Pasted image 20220329221902.png]]

Users can edit other aspects of the patient's profile on the edit page too. And the changes will be reflected on the 'Patient' table in the MySQL database.

![[Pasted image 20220329221955.png]]




## Delete Patient
![[Pasted image 20220329222053.png]]

As the final feature in a 'CRUD' program, the 'Delete Patient' page allows users to remove patients from the database.
![[Pasted image 20220329222414.png]]

After hitting the 'Delete' button, the user will receive an alert asking to confirm their selection.

![[Pasted image 20220329222555.png]]

Once confirmed we will see that the patient has been remove from the page, and the database has also been updated.


![[Pasted image 20220329222536.png]]

## User Accounts
![[Pasted image 20220329222654.png]]
The 'Users' table of the database is a listing of all the active users for the web-app. We can see that their passwords have been encrypted. In future iterations of the program, all other information will be encrypted.
