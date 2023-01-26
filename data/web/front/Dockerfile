FROM node:lts-alpine

WORKDIR /usr/app

COPY ./package*.json ./

RUN npm config set unsafe-perm true
RUN npm install --silent -cy

COPY . .

RUN chmod a+rwx /usr/app/node_modules

EXPOSE 3000

CMD ["npm", "start"]
