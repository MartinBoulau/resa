# **Get Started**

## **Summary** 
- [Clone project](#clone-project) 
- [Launch docker-compose](#build--up)
- [Composer Install & Update](#composer-install--update)
    - [Windows](#windows)
    - [Linux](#linux)

## **Clone project**
```
git clone https://gitlab.com/lpweb2/resa-vehicule.git
cd resa-vehicule
```
## **Build & Up**
```docker
docker-compose build
docker-compose up -d
```

## **Composer Install & Update**

### Windows
```docker
# Backend
docker exec -it symfony-php composer install
docker exec -it symfony-php composer update

# API
docker exec -it symfony-api composer install
docker exec -it symfony-api composer update
```
### Linux
```bash
./launch.sh
```
- Si une erreur bash apparaît /bin/bash^M 
    ```bash
    sed -i -e 's/\r$//' launch.sh
    ./launch.sh
    ```
- Si une erreur bash subsiste vérifier que le **PATH** vers bash est le bon dans le script 
    ```bash
    which bash
    ```
    Changer dans le script #!/bin/bash par le résultat de la commande

- Si une erreur de permission apparaît 
    ```bash
    sudo sh ./launch.sh
    OU
    sudo ./launch.sh
    ```

La WebApp est maintenant prête à l'utilisation




