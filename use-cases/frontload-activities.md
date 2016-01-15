# Front-load Activities #

Calculate the earliest possible start times for all activities in the project

<dl class="use-case-properties">
	<dt>Primary Actor(s)</dt>
	<dd>Planner</dd>
	
	<dt>Level</dt>
	<dd>User goal</dd>
	
	<dt>Precondition</dt>
	<dd>At least two activities have been added to the project</dd>
	
	<dt>Trigger</dt>
	<dd>User gives menu command to see the earliest start times of all activities</dd>
</dl>

## Main Success Scenario ##

The following steps are performed by the system:

<ol class="scenario">
	<li>Find all Activities of the Project
	<li>Reset start times of all Activities
	<li>Find Activities that are unplanned but whose Predecessors have been planned
	<li>Plan each of these Activities: set its start time to the latest (maximum) early-finish time of its Predecessors
	<li>Continue from step 3 until all Activities are planned (we might traverse the Activities multiple times)
	<li>Display the project plan as a Gantt chart
</ol>

### Deviations

__4a. No Predecessors__

If there are no Predecessors, set the Activity's start time to the start time of the Project.