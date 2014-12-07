# Add Activity #

Add an activity to the project

<dl class="use-case-properties">
	<dt>Primary Actor(s)</dt>
	<dd>Planner</dd>
	
	<dt>Level</dt>
	<dd>User goal</dd>
	
	<dt>Precondition</dt>
	<dd>None</dd>
	
	<dt>Trigger</dt>
	<dd>User gives menu command to add a new activity</dd>
</dl>

## Main Success Scenario ##

<header class="scenario-columns-header">
	<h4>User Action</h4>
	<h4>System Responsibility</h4>
</header>

<ol class="scenario">
	<li class="user">Planner enters the information for the Activity, including its name, duration, and a
		number representing its resource requirements
	<li class="system">Validates the information and saves the Activity to the database
	<li class="system">Displays the new activity on the Gantt chart
</ol>

### Deviations ###

__1a. The user leaves one of the required fields blank (e.g. name, duration, resource requirement),
or enters invalid data (e.g. a non-numeric value for the resource requirement)__  
The system displays an error message

__1b. An activity with the provided name already exists__  
The system displays an error message
