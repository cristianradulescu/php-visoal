EXAMPLE_PAYLOAD:=$(shell echo 6,5,3,12,11,7)

.PHONY: examples
examples: example-bubble-sort example-selection-sort example-insertion-sort example-merge-sort

example-bubble-sort: run-bubble-sort.php
	php $^ $(EXAMPLE_PAYLOAD)

example-selection-sort: run-selection-sort.php
	php $^ $(EXAMPLE_PAYLOAD)

example-insertion-sort: run-insertion-sort.php
	php $^ $(EXAMPLE_PAYLOAD)

example-merge-sort: run-merge-sort.php
	php $^ $(EXAMPLE_PAYLOAD)
