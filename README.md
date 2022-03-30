# Schedulr
Schedulr is a CRUD web-app that is based on PHP. The following documentation will explain the workings of version 1 of the program, as well as some of the underlying code. I have planned a future iteration of this program that will be based on Python and will incorporate End-to-End Encryption, and also have a session manager, and also keylogging.
## Dashboard

![](https://github.com/amadzarak/Schedulr-v.1.0/blob/main/images/Pasted%20image%2020220329221154.png?raw=true)
When a user first logins into the system they are presented with the dashboard screen. On the dashboard screen the user can perform various actions relating to practice management.

In order to protect patient privacy, all screenshots will use names related to the NFL.
![](https://github.com/amadzarak/Schedulr-v.1.0/blob/main/images/Pasted%20image%2020220329214153.png?raw=true)

The main purpose of the dashboard for for report generation. A user can filter their reports in three main ways:
1. Facility
2. Provider
3. Date

By default the dashboard reports all activities for the current date.

### Filters
![](https://github.com/amadzarak/Schedulr-v.1.0/blob/main/images/Pasted%20image%2020220329214245.png?raw=true)
All patients that are listed under 'New England Patriots' will appear. Simply by selecting the dropdown, a user can filter by the name of the facility.
A user can add more facilities to the database by entering the 'Add Facility' page.

Similarly, a user can use multiple filters at once, simply by selecting other criteria.

### Generating Reports
![](https://github.com/amadzarak/Schedulr-v.1.0/blob/main/images/Pasted%20image%2020220329214903.png?raw=true)
By using the filters on the dashboard, a user can generate reports in the form of a pdf. This allows for easy sharing of information. For example, a provider can have easy access to their schedule, and where the patients they need to visit are, within the facility.

![](https://github.com/amadzarak/Schedulr-v.1.0/blob/main/images/Pasted%20image%2020220329215030.png?raw=true)
Additionally, practice managers can gain information relating to all practice wide activities, and gain insight on provider productivity. 
## Reschedule
![](https://github.com/amadzarak/Schedulr-v.1.0/blob/main/images/Pasted%20image%2020220329221241.png?raw=true)
One of the more powerful functions contained within the web application is the rescheduling page. On this page a user can batch select multiple patients and reschedule them. Additionally, a user can make updates to the schedule by changing the provider assigned or changing the date of the appointment.

![](https://github.com/amadzarak/Schedulr-v.1.0/blob/main/images/Pasted%20image%2020220329215349.png?raw=true)

![](https://github.com/amadzarak/Schedulr-v.1.0/blob/main/images/Pasted%20image%2020220329215423.png?raw=true)
Above, two patients have been assigned the provider 'Zarak' and are scheduled to be seen on March 31.

![](https://github.com/amadzarak/Schedulr-v.1.0/blob/main/images/Pasted%20image 20220329215505.png?raw=true)

If 'Zarak' was not available for the date of the appoint, the patient can be assigned a different provider.
![](https://github.com/amadzarak/Schedulr-v.1.0/blob/main/images/Pasted%20image%2020220329215615.png?raw=true)
![](https://github.com/amadzarak/Schedulr-v.1.0/blob/main/images/Pasted%20image%2020220329215659.png?raw=true)


## Add Patient
![](https://github.com/amadzarak/Schedulr-v.1.0/blob/main/images/Pasted%20image%2020220329221326.png?raw=true)

![](https://github.com/amadzarak/Schedulr-v.1.0/blob/main/images/Pasted%20image%2020220329220047.png?raw=true)

If we look at the results of our reschedule function, we can see that the values for the patients have been updated in our database. We can additionally add more patients to the practice on our 'Add Patient' page.

![](https://github.com/amadzarak/Schedulr-v.1.0/blob/main/images/Pasted%20image%2020220329220302.png?raw=true)

We can add patient 'Chris Godwin' to be scheduled for 'March 31, 2022.' When we go on the dashboard page, we will see 'Chris Godwin' along with the other patients that have been scheduled for 'March 31, 2022.'

![](https://github.com/amadzarak/Schedulr-v.1.0/blob/main/images/Pasted%20image%2020220329220422.png?raw=true)

We can check the 'Patient' table, and see that 'Chris Godwin' has been added.
![](https://github.com/amadzarak/Schedulr-v.1.0/blob/main/images/Pasted%20image%2020220329220522.png?raw=true)
## Add Facility
![](https://github.com/amadzarak/Schedulr-v.1.0/blob/main/images/Pasted%20image%2020220329221403.png?raw=true)
Another 'Create' function. A user can fill out the form and they will be able to add another facility to the facility database.

![](https://github.com/amadzarak/Schedulr-v.1.0/blob/main/images/Pasted%20image%2020220329215818.png?raw=true)

In terms of the database structure, 'Miami Dolphins' are now added to the table 'facility'

![](https://github.com/amadzarak/Schedulr-v.1.0/blob/main/images/Pasted%20image%2020220329215944.png?raw=true)



## Add Provider

![](https://github.com/amadzarak/Schedulr-v.1.0/blob/main/images/Pasted%20image%2020220329221033.png?raw=true)
![](https://github.com/amadzarak/Schedulr-v.1.0/blob/main/images/Pasted%20image%2020220329220743.png?raw=true)
We can update the table 'Providers' on the 'Add a Provider' page, and filling out the information.

![](https://github.com/amadzarak/Schedulr-v.1.0/blob/main/images/Pasted%20image%2020220329220831.png?raw=true)

And we can see that the 'Providers' table has been updated to reflect the new information.
![](https://github.com/amadzarak/Schedulr-v.1.0/blob/main/images/Pasted%20image%2020220329220851.png?raw=true)
## Edit Patient
![](https://github.com/amadzarak/Schedulr-v.1.0/blob/main/images/Pasted%20image%2020220329221444.png?raw=true)

The 'Edit Patient' page allows users to correct any mistakes that may have occurred when originally entering the patient information. For example, assume that a patient has been assigned to wrong facility. The edit page allows a user to fix that.
![](https://github.com/amadzarak/Schedulr-v.1.0/blob/main/images/Pasted image 20220329221605.png?raw=true)

We can see that 'Tom Brady' and 'Rob Gronkowski' have been assigned to the wrong facility. While they are originally located at 'New England Patriots' their facility now needs to be updated to 'Tampa Bay Buccaneers'.

![](https://github.com/amadzarak/Schedulr-v.1.0/blob/main/images/Pasted%20image%2020220329221735.png?raw=true)
The 'Edit' page is structured very similarly to the 'Add Patient' page. After the required changes have been made we can submit. And the patient profile will be updated.

![](https://github.com/amadzarak/Schedulr-v.1.0/blob/main/images/Pasted%20image%2020220329221902.png?raw=true)

Users can edit other aspects of the patient's profile on the edit page too. And the changes will be reflected on the 'Patient' table in the MySQL database.

![](https://github.com/amadzarak/Schedulr-v.1.0/blob/main/images/Pasted%20image%2020220329221955.png?raw=true)




## Delete Patient
![](https://github.com/amadzarak/Schedulr-v.1.0/blob/main/images/Pasted%20image%2020220329222053.png?raw=true)

As the final feature in a 'CRUD' program, the 'Delete Patient' page allows users to remove patients from the database.
![](https://github.com/amadzarak/Schedulr-v.1.0/blob/main/images/Pasted%20image%2020220329222414.png?raw=true)

After hitting the 'Delete' button, the user will receive an alert asking to confirm their selection.

![](https://github.com/amadzarak/Schedulr-v.1.0/blob/main/images/Pasted%20image%2020220329222555.png?raw=true)

Once confirmed we will see that the patient has been remove from the page, and the database has also been updated.


![](https://github.com/amadzarak/Schedulr-v.1.0/blob/main/images/Pasted%20image%2020220329222536.png?raw=true)

## User Accounts
![](https://github.com/amadzarak/Schedulr-v.1.0/blob/main/images/Pasted%20image%2020220329222654.png?raw=true)
The 'Users' table of the database is a listing of all the active users for the web-app. We can see that their passwords have been encrypted. In future iterations of the program, all other information will be encrypted.
