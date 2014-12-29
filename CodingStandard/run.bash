#!/bin/bash
echo "****************************************"
echo "Test Suite - ClassicWeb"

BASEDIR=$(dirname $0)
if [ -x /Applications/MAMP/bin/php/php5.6.2/bin/php ]; then
    PHP="/Applications/MAMP/bin/php/php5.6.2/bin/php -d date.timezone='Europe/Paris'"
else
    PHP="php -d date.timezone='Europe/Paris'"
fi

MODE="$1"

if [[ "testsonly" != $MODE  ]]
then

echo "******** Mess Detector ********" | tee ${BASEDIR}/metrics/phpmd_results.md
$PHP ./vendor/phpmd/phpmd/src/bin/phpmd ${BASEDIR}/../src/ text ${BASEDIR}/md_ruleset.xml | tee -a ${BASEDIR}/metrics/phpmd_results.md

echo "******** Copy/Paste Detector ********" | tee ${BASEDIR}/metrics/phpcpd_results.md
$PHP ./vendor/sebastian/phpcpd/phpcpd ${BASEDIR}/../src/ | tee -a ${BASEDIR}/metrics/phpcpd_results.md

echo "******** Depend ********"
$PHP ./vendor/pdepend/pdepend/src/bin/pdepend --summary-xml=${BASEDIR}/metrics/phpdepend_summary.xml --jdepend-chart=${BASEDIR}/metrics/phpdepend_depend.svg --overview-pyramid=${BASEDIR}/metrics/phpdepend_pyramid.svg ${BASEDIR}/../src/ > ${BASEDIR}/metrics/phpdepend_results.md

echo "******** CodeSniffer ********"
$PHP ./vendor/squizlabs/php_codesniffer/scripts/phpcs --standard=${BASEDIR}/cs_ruleset.xml  --ignore=Resources/public ${BASEDIR}/../src/

fi

echo "******** Units Tests ********" | tee ${BASEDIR}/metrics/tests_results.md
$PHP ./vendor/phpunit/phpunit/phpunit -c ${BASEDIR}/../app | tee -a ${BASEDIR}/metrics/tests_results.md

echo "********"
echo "Done."

exit 0;