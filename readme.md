# Project 4

## Live URL
<http://p4.doingwellapp.com>

## Description
This project was to create a web application called 'Plan My Week'. The idea was to provide a simple interface for creating a weekly calendar of activities so that the user could organize their hours efficiently.  The user could create, prioritize, and choose activities such as fitness, study, and socializing and organize those hours around must-haves such as work, family time, and sleep.  The chosen activities could be added to a named schedule and viewed in a calendar.

## Demo
http://screencast.com/t/mdp453EPVT

## Details for teaching team
Once again, I ran out of time.  I was able to do the CRUD for the activities and schedules, create groups, and do some validation and user authentication.  I was pretty sure that I wasn't going to get to the non-essentials such as de-confliction and deleting activities from the Calendar View so that wasn't a surprise.  I was also unable to get to one of my essentials which was to view activities by group.  I also didn't do much client-side validation.

On the positive side, I was able to connect users to schedules - the logged in user can only see their schedules.  I think I finally understand the relationships with regard to setting up the models a bit better (you can tell me).  I got some of the jQuery working more or less, and was able to use the calendar view to display the schedules.  Integrating javascript and jQuery - plus the bootstrap styling - was a great way to round out my Web Technologies classwork.  I did enjoy working on this project, though I'm exhausted!

Note on the validation.  I had 2 w3c validation errors that I couldn't shake.  First, the debugbar code has an error on the css that comes with it.  The other issue was that the way we are making the select list select our value on edit pages (taken from the foobooks example) leaves a random 'select' text in the list in the markup.  I tried to fix it but I couldn't figure it out.

## Outside code
I used the FullCalendar jQuery plugin (and associated css and js code) for my calendar view.  I used the Bootstrap datepicker for the schedule start date selection.  Also I used bootstrap.min.css for styling, especially for the navbars and the create/edit schedule pages.
