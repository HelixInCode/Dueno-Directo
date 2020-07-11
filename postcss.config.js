const autoprefixer = require("autoprefixer");

module.exports = {
  plugins:[
    require('postcss-cssnext')({
      features: {
        autoprefixer: {
          flexbox: false,
          grid: false,
        },
        customProperties: true,
      }
    })
  ]
}