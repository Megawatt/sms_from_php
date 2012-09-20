# ================================================
#
# Makefile for installing
# the sms_from_php files to a local server from a working
# directory
#
# uses gmake, you need to have it installed.
# type make help for options
#
# Megawatt Sep 2012
#
# ================================================
#
# target directory
releasedir = /var/www/sms

.PHONY: install
install:
	sudo mkdir -p $(releasedir)
	sudo cp * -r $(releasedir)

.PHONY: clean
clean:
	sudo rm -rf $(releasedir)

.PHONY: distclean
distclean: clean

.PHONY: help
help:
	@echo "options:"
	@echo "make install       installs the files to target directory "
	@echo "make clean         removes the installed files from target"
	@echo "make distclean     same as clean"
	@echo "help               you are reading it"
	@echo

