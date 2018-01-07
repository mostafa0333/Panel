HOMEPATH=home/container

apt-get -y install sshpass
apt-get -y install wget
apt-get -y install ssh
apt-get -y install rsync
apt-get -y install bzip2

	case "$@" in 
  *-fastdl*)
	
  cd $HOMEPATH/csgo

echo "FastDL Script by SkyChrome"
echo "This will take a few moments. This will automatically setup Fasttdl up for you."

echo "Compressing all files."



IFS=$'\n'

for path in $(find . -type f | egrep '^\./(maps|models|materials|sound)/' | sed 's|^\./||')

do

        if [ ! -e "$HOMEPATH/fastdl/$path.bz2" ]; then

                nice -n +19 ionice -n 2 cp --parents "$path" "$HOMEPATH/fastdl/"

                nice -n +19 ionice -n 2 bzip2 -s -1 "$HOMEPATH/fastdl/$path"

        fi

done



ipserver=%ip%

ipserver=`echo $ipserver | sed -e 's/\./_/g'`



echo "Uploading to a external server."

sshpass -p96HCLgHK rsync -a --delete $HOMEPATH/fastdl/ root@p3.quantumpanel.ga:/var/www/html/fastdl/${SERVER_IP}/${SERVER_PORT} 

echo "Done!"



echo "Configuring FastDl up for you."

sed -i -e '/sv_downloadurl/d' $HOMEPATH/csgo/cfg/server.cfg

sed -i '/^$/N;/^\

$/D' $HOMEPATH/csgo/cfg/server.cfg

echo >> $HOMEPATH/csgo/cfg/server.cfg

echo -n "sv_downloadurl \"http://vps498274.ovh.net/${SERVER_IP}/${SERVER_PORT}\"" >> $HOMEPATH/csgo/cfg/server.cfg



echo "Finished FastDl!"

echo "Staring..."

./srcds_run -game csgo -console -port ${SERVER_PORT} +ip 0.0.0.0 -strictportbind -norestart $@
	;;
    esac
	
	echo "Skipping FastDL setup, to enable fastdl sync on every startup, type in the commandline -fastdl"
	
	./srcds_run -game csgo -console -port ${SERVER_PORT} +ip 0.0.0.0 -strictportbind -norestart $@

	
