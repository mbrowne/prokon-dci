# Back-load Activities #

Calculate the latest possible start times for all activities in the project

<dl class="use-case-properties">
	<dt>Primary Actor(s)</dt>
	<dd>Planner</dd>
	
	<dt>Level</dt>
	<dd>User goal</dd>
	
	<dt>Precondition</dt>
	<dd>At least two activities have been added to the project</dd>
	
	<dt>Trigger</dt>
	<dd>User gives menu command to see the latest finish times of all activities</dd>
</dl>

## Main Success Scenario ##

<ol class="scenario">
	<li>Find all Activities of the project
	<li>Reset end times of all Activities
	<li>Find Activities that are unplanned but whose successors have been planned
	<li>Check if each of those Successors is planned:
		<ol>
			<li>If so, plan this activity - set end time to the earliest Successor's start time
			<li>If not, set its end time to the end time of the project
		</ol>
	</li>
	<li>Continue until all Activities are planned (we might loop existing Activities several times)
</ol>