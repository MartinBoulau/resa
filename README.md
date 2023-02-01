# **Resa - vehicule**

## **Liens Utiles**

- [Trello](https://trello.com/invite/b/HsstgwEn/ATTIbb21c2ff6dfcf0ea11d55001768612266702B637/resa-vehicule) (Suivi du backlog)

- [Document SCRUM](https://docs.google.com/document/d/1jzWGNnzuix2i1c3VxTxgcsdcfnePInaKWP68j39q2Eo/edit?usp=sharing ) (Suivi réunion SCRUM)

- [Maquette Figma](https://www.figma.com/file/yZ3n6Dh3PViBhDWJAEFhMh/AutoResa?node-id=1%3A2&t=9P61pSlhDyEeTVup-1)

## **Utilisation de GIT**

### Cloner le projet dans un dossier

```bash
    cd existing_repo
    git clone https://gitlab.com/lpweb2/resa-vehicule.git
```
### Pour **PULL** (ex: branch dev)

```bash
    git checkout dev
    git pull origin/dev
```

### Pour **CRÉER** une nouvelle branche
- Branche de **feature**

```bash
    git checkout -b features/<nom_branche>
```
- Branche de **release**

```bash
    git checkout -b release/<nom_branche>
```
- Branche de **hotfix**

```bash
    git checkout -b hotfix/<nom_branche>
```

### Pour **PUSH**

```bash
    git add .
    git commit -a -m "ton_commit"
    # Pour une modification avant push
        # [FIX] - commit message 
    # Pour une modification après push
        # [CHG] - commit message 
    # Pour un ajout
        # [ADD] - commit message 
    # Pour une suppression
        # [DEL] - commit message
    git push
```

### Pour **MERGE** 

```bash
    make new merge request sur git 
    branch <nom_branche> 
    -> sur dev
    Assign SwaiiZ
```

### Pour **SWITCH** 

Permet de changer de branche avec vos modifications actuelles

```bash
    git switch <nom_branche>
```

Pour créer une nouvelle branche en même temps

```bash
    git switch -c <nom_branche>
```

### Pour **STASH** & **POP**

Pour mettre vos modifications en tampon pour pouvoir changer de branche

```bash
    git stash
```

Pour récupérer vos modifications mises en tampon

```bash
    git stash pop
```


***
