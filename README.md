# ZR Test Plugin
Adds a Gutenberg block that prints the site name prefixed by a string.

## Installation 
use npm `>= 16`
Run `npm i && npm run build` from root.

## Api 
Get a list of posts by accessing `https://yoursite.com/wp-json/zr-test-plugin/v1/books`
This will return a list of formatted posts
```
 {
   "ID": 88,
   "name": "A test",
   "description": "\n<p>Synergistically benchmark customer directed markets and corporate platforms.</p>",
   "cover": "https://test.local/wp-content/uploads/2022/06/14210191994_c21327d625_b.jpg",
   "url": "https://test.local/book/test/",
   "genre": [
              {
               "term_id": 13,
               "name": "Action",
               "slug": "action",
               "term_group": 0,
               "term_taxonomy_id": 13,
               "taxonomy": "genre",
               "description": "",
               "parent": 0,
               "count": 20,
               "filter": "raw"
              }
            ]
}
```


### Gutenberg block and shortcode
![image](https://user-images.githubusercontent.com/14840519/174982274-7c95d688-b3fe-49aa-9db9-a4f35f029ca6.png) \

### Post type Book
![image](https://user-images.githubusercontent.com/14840519/174982379-d6b435e7-04ea-4aa9-bd65-ead98924ecc5.png)
