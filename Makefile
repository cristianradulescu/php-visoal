PAYLOAD:=$(shell echo 6,5,3,12,11,7)

example-bubble-sort: run-bubble-sort.php
	php $^ $(PAYLOAD)

example-selection-sort: run-selection-sort.php
	php $^ $(PAYLOAD)

example-insertion-sort: run-insertion-sort.php
	php $^ $(PAYLOAD)

example-merge-sort: run-merge-sort.php
	php $^ $(PAYLOAD)
