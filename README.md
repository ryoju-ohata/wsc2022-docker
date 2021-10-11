# WSC2022

## Start

```bash
docker-compose down --volume && docker-compose build && docker-compose up -d
docker exec -it app /usr/sbin/sshd
```

## Create Dir

```bash
for i in {8002..8015}; do
  mkdir $i && mkdir $i/public && echo $i > $i/public/index.html
done
```
