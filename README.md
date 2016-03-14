# PlatformCTFNetsos
 
/* created by AJ, disclaimer: gw ga ngerti cuy */

ToDo
====
- FRONT PAGE
	- quick infos
	- top ten leaderboard
	- login / register
	- categories

- DASHBOARD
	- Profile edit
	- [admin] additional input

- LEADERBOARD
	- Overall scoreboard
	- Per contest scoreboard

- CONTEST PAGE
	- Task list
	- Per contest scoreboard

- ARCHIVES PAGE
	- Per contest
	- Per category

- PROFILE PAGE
	- user infos
	- user history


Database Design
===============
- Users
	- id [PK]
	- username / handle
	- fullname
	- email
	- added
	- last_active
	- password

- User_history
	- id
	- user
	- contest
	- position
	- points

// related to per contest
- Contests
	- id [PK]
	- name
	- description
	- active (bool)
	- start_date
	- end_date

- Categories
	- id [PK]
	- name
	- description

- Tasks / Problems / Challenges ?
	- id [PK]
	- title
	- description
	- category
	- flag

- Hints
	- id [PK]
	- content

- contest_task_items
	- id [PK]
	- contest
	- task
	- hint
	- points

- submissions
	- id [PK]
	- added (date)
	- content_task_item
	- submitted_answer
	- user
	- correct (bool)

- Participation (user_contest)
	- id
	- user [one]
	- contest [one]

- participation_solved_tasks_score
	- participation_id
	- contest_task_item_id
	- bonus_score


ADMINISTRATION FEATURE
======================
- Create/Edit Tasks
	- Each task has:
		- Title
		- Description
		- Category
		- Flag / answer
		- Points
		- enabled in archive

- Create/Edit Contests
	- Each contest has:
		- Title
		- Description
		- Available date
	- Assign available tasks to contests
		- available date
		- prerequisite condition
		- score
	- More mode to be added...

- Create hint
	- each hint has:
		- Title
		- Description
		- Task_id
		- Enabled?

- Create category
	- each category has:
		- name
		- description

- See and moderate submissions

- Users control