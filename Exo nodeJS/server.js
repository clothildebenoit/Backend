console.log('salut')
let http = require ('http')

let server = http.createServer()
server.on('request', (request, response) => {
    console.log('il y a une requête')
})

server.listen(8080)