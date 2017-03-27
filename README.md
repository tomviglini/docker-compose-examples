root@tom-pc:/projects/docker# cat index.js
console.log("Hello World v1");

root@tom-pc:/home/tom/projects/docker# docker build -t app:v0.0.1 .
Sending build context to Docker daemon 6.144 kB
Step 1/5 : FROM node:alpine
alpine: Pulling from library/node
709515475419: Pull complete
943e0887e008: Pull complete
c99fe67ba1a0: Pull complete
Digest: sha256:f20be1cf343dfea60d8250ed209e28ee9de9e3b69d414a9f5b0e1deb23ac0c45
Status: Downloaded newer image for node:alpine
 ---> 74e82e5e3928
Step 2/5 : RUN mkdir -p /code
 ---> Running in 2ff3bbc7f16e
 ---> 4a1fff245e87
Removing intermediate container 2ff3bbc7f16e
Step 3/5 : WORKDIR /code
 ---> 9fbd043c09ed
Removing intermediate container 5c5915e991ca
Step 4/5 : ADD . .
 ---> a824755d6677
Removing intermediate container a25a2de04054
Step 5/5 : CMD node index.js
 ---> Running in c36a9eb23241
 ---> 2c4a347b1802
Removing intermediate container c36a9eb23241
Successfully built 2c4a347b1802


root@tom-pc:/home/tom/projects/docker# docker images
REPOSITORY          TAG                 IMAGE ID            CREATED             SIZE
app                 v0.0.1              2c4a347b1802        22 seconds ago      59.2 MB
node                alpine              74e82e5e3928        2 days ago          59.2 MB


root@tom-pc:/home/tom/projects/docker# docker build -t app:v0.0.2 .
Sending build context to Docker daemon 6.144 kB
Step 1/5 : FROM node:alpine
 ---> 74e82e5e3928
Step 2/5 : RUN mkdir -p /code
 ---> Using cache
 ---> 4a1fff245e87
Step 3/5 : WORKDIR /code
 ---> Using cache
 ---> 9fbd043c09ed
Step 4/5 : ADD . .
 ---> Using cache
 ---> a824755d6677
Step 5/5 : CMD node index.js
 ---> Using cache
 ---> 2c4a347b1802
Successfully built 2c4a347b1802


root@tom-pc:/home/tom/projects/docker# docker images
REPOSITORY          TAG                 IMAGE ID            CREATED             SIZE
app                 v0.0.1              2c4a347b1802        2 minutes ago       59.2 MB
app                 v0.0.2              2c4a347b1802        2 minutes ago       59.2 MB
node                alpine              74e82e5e3928        2 days ago          59.2 MB


root@tom-pc:/projects/docker# cat index.js
console.log("Hello World v2");


root@tom-pc:/home/tom/projects/docker# docker build -t app:v0.0.3 .
Sending build context to Docker daemon 6.144 kB
Step 1/5 : FROM node:alpine
 ---> 74e82e5e3928
Step 2/5 : RUN mkdir -p /code
 ---> Using cache
 ---> 4a1fff245e87
Step 3/5 : WORKDIR /code
 ---> Using cache
 ---> 9fbd043c09ed
Step 4/5 : ADD . .
 ---> 03f15c6d68bc
Removing intermediate container 5ee87f153f00
Step 5/5 : CMD node index.js
 ---> Running in c917158169f8
 ---> 2804aee5ef2d
Removing intermediate container c917158169f8
Successfully built 2804aee5ef2d


root@tom-pc:/home/tom/projects/docker# docker images
REPOSITORY          TAG                 IMAGE ID            CREATED             SIZE
app                 v0.0.3              2804aee5ef2d        32 seconds ago      59.2 MB
app                 v0.0.1              2c4a347b1802        3 minutes ago       59.2 MB
app                 v0.0.2              2c4a347b1802        3 minutes ago       59.2 MB
node                alpine              74e82e5e3928        2 days ago          59.2 MB



root@tom-pc:/projects/docker# docker history app:v0.0.1
IMAGE               CREATED             CREATED BY                                      SIZE                COMMENT
2c4a347b1802        4 minutes ago       /bin/sh -c #(nop)  CMD ["node" "index.js"]      0 B
a824755d6677        4 minutes ago       /bin/sh -c #(nop) ADD dir:f73bff07fe36ffe9...   2.45 kB
9fbd043c09ed        4 minutes ago       /bin/sh -c #(nop) WORKDIR /code                 0 B
4a1fff245e87        4 minutes ago       /bin/sh -c mkdir -p /code                       0 B
74e82e5e3928        2 days ago          /bin/sh -c #(nop)  CMD ["node"]                 0 B
<missing>           2 days ago          /bin/sh -c apk add --no-cache --virtual .b...   3.58 MB
<missing>           2 days ago          /bin/sh -c #(nop)  ENV YARN_VERSION=0.21.3      0 B
<missing>           2 days ago          /bin/sh -c adduser -D -u 1000 node     && ...   50.8 MB
<missing>           2 days ago          /bin/sh -c #(nop)  ENV NODE_VERSION=7.7.4       0 B
<missing>           3 weeks ago         /bin/sh -c #(nop)  ENV NPM_CONFIG_LOGLEVEL...   0 B
<missing>           3 weeks ago         /bin/sh -c #(nop) ADD file:3df55c321c1c8d7...   4.81 MB

root@tom-pc:/projects/docker# docker history app:v0.0.3
2804aee5ef2d        11 minutes ago      /bin/sh -c #(nop)  CMD ["node" "index.js"]      0 B
03f15c6d68bc        11 minutes ago      /bin/sh -c #(nop) ADD dir:7a7c1c6363a3cb01...   2.45 kB
9fbd043c09ed        14 minutes ago      /bin/sh -c #(nop) WORKDIR /code                 0 B
4a1fff245e87        14 minutes ago      /bin/sh -c mkdir -p /code                       0 B
74e82e5e3928        2 days ago          /bin/sh -c #(nop)  CMD ["node"]                 0 B
<missing>           2 days ago          /bin/sh -c apk add --no-cache --virtual .b...   3.58 MB
<missing>           2 days ago          /bin/sh -c #(nop)  ENV YARN_VERSION=0.21.3      0 B
<missing>           2 days ago          /bin/sh -c adduser -D -u 1000 node     && ...   50.8 MB
<missing>           2 days ago          /bin/sh -c #(nop)  ENV NODE_VERSION=7.7.4       0 B
<missing>           3 weeks ago         /bin/sh -c #(nop)  ENV NPM_CONFIG_LOGLEVEL...   0 B
<missing>           3 weeks ago         /bin/sh -c #(nop) ADD file:3df55c321c1c8d7...   4.81 MB

root@tom-pc:/projects/docker# docker history node:alpine
IMAGE               CREATED             CREATED BY                                      SIZE                COMMENT
74e82e5e3928        2 days ago          /bin/sh -c #(nop)  CMD ["node"]                 0 B
<missing>           2 days ago          /bin/sh -c apk add --no-cache --virtual .b...   3.58 MB
<missing>           2 days ago          /bin/sh -c #(nop)  ENV YARN_VERSION=0.21.3      0 B
<missing>           2 days ago          /bin/sh -c adduser -D -u 1000 node     && ...   50.8 MB
<missing>           2 days ago          /bin/sh -c #(nop)  ENV NODE_VERSION=7.7.4       0 B
<missing>           3 weeks ago         /bin/sh -c #(nop)  ENV NPM_CONFIG_LOGLEVEL...   0 B
<missing>           3 weeks ago         /bin/sh -c #(nop) ADD file:3df55c321c1c8d7...   4.81 MB




root@tom-pc:/var/lib/docker/aufs/diff# tree
.
├── 081f540b87ef6a0ceb9ae19ccc7059695f5938ac37fe22526354515d1decc62c
... 554 directories, 2227 files
├── 2f7ff1687cf2a01512ef69c544c7d63bf3efcc327afb467aee21cb5bbc4941e7
... 78 directories, 374 files
├── 9fa019c2e5c4c65d288fffa992f6aa063e7cf9a52ac4c55a551677a4830b5ddd
... 19 directories, 5 files
├── b0bee9247f211f1905f8481378a56cd147685fc4014306eac7ae7ff27c9a3c72
│   └── code
└── 5660ca195011df4793d9fc82b7ebda6c66315789097b484d81b2acccf0574f29
    └── code
        ├── Dockerfile
        └── index.js
└── 572dacde9439615e0477d9b6ccf1513b30e467fb1e33efe00a067dde8c1c0451
    └── code
        ├── Dockerfile
        └── index.js
