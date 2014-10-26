# Front-load Activities #

Calculate the earliest possible start times for all activities in the project

<dl class="use-case-properties">
	<dt>Primary Actor(s)</dt>
	<dd>Planner</dd>
	
	<dt>Priority</dt>
	<dd>A</dd>
	
	<dt>Level</dt>
	<dd>User goal</dd>
	
	<dt>Precondition</dt>
	<dd>At least two activities have been added to the project</dd>
	
	<dt>Trigger</dt>
	<dd>User gives menu command to see the earliest start times of all activities</dd>
</dl>

## Main Success Scenario ##

<ol class="scenario">
	<li>Find all Activities of the project
	<li>Reset start times of all Activities
	<li>Find Activities that are unplanned but whose predecessors have been planned
	<li>Check if each of those Predecessors is planned:
		<ol>
			<li>If so, plan this activity - set start time to the latest Precessor's end time
			<li>If not, set its start time to the start time of the project
		</ol>
	</li>
	<li>Continue until all Activities are planned (we might loop existing Activities several times)
</ol>