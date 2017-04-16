@echo off
TITLE PING
set LINK01=prod.magellan3.ha.westgroup.com:9176
set LINK02=prod.judicialreports.int.westgroup.com:80
set LINK03=eg.tlrcitrix.thomsonreuters.com:443
set SQLDIR=C:\xampp\mysql\bin\
set SQLUSR=root
set SQLHOS=localhost
set SQLQRY=INSERT INTO `site_ping_response` (`ping_id`, `site_id`, `response`, `date`, `time`) VALUES (NULL, '', '', '', '')

:start
:datetime
REM set date
for /f "tokens=1-4 delims=/ " %%i in ("%date%") do (
 set dow=%%i
 set month=%%j
 set day=%%k
 set year=%%l
)
set DATESTR=%year%-%month%-%day%
set TIMESTR=%TIME:~0,2%:%TIME:~3,2%:%TIME:~6,2%

echo Logging sites status %DATESTR% %TIMESTR%

for /f "tokens=9" %%i in ('psping %LINK01% ^| find "Average = "') do set TEST1=%%i
for /f "tokens=9" %%i in ('psping %LINK02% ^| find "Average = "') do set TEST2=%%i
for /f "tokens=9" %%i in ('psping %LINK03% ^| find "Average = "') do set TEST3=%%i
%SQLDIR%mysql.exe -h %SQLHOS% --user=%SQLUSR% -e "INSERT INTO test.site_ping_response(site_id,response,date,time) VALUES ('1','%TEST1:~0,-2%','%DATESTR%','%TIMESTR%')"
%SQLDIR%mysql.exe -h %SQLHOS% --user=%SQLUSR% -e "INSERT INTO test.site_ping_response(site_id,response,date,time) VALUES ('2','%TEST2:~0,-2%','%DATESTR%','%TIMESTR%')"
%SQLDIR%mysql.exe -h %SQLHOS% --user=%SQLUSR% -e "INSERT INTO test.site_ping_response(site_id,response,date,time) VALUES ('3','%TEST3:~0,-2%','%DATESTR%','%TIMESTR%')"
cls
echo Sites status has been recorded.
TIMEOUT /T 600
goto :start
pause