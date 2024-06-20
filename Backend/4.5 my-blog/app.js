import express from 'express';
import bodyParser from 'body-parser';
import methodOverride from 'method-override';

const app = express();

// Middleware
app.use(bodyParser.urlencoded({ extended: true }));
app.use(express.static('public'));
app.use(methodOverride('_method'));

// Set the view engine to EJS and specify the views directory
app.set('view engine', 'ejs');
app.set('views', './views');

// Temporary storage for posts
let posts = [];

// Routes
app.get('/', (req, res) => {
    res.render('index', { posts: posts });
});

app.get('/posts/new', (req, res) => {
    res.render('new-post');
});

app.post('/posts', (req, res) => {
    const newPost = {
        id: posts.length + 1,
        title: req.body.title,
        content: req.body.content
    };
    posts.push(newPost);
    res.redirect('/');
});

app.get('/posts/:id/edit', (req, res) => {
    const post = posts.find(p => p.id === parseInt(req.params.id));
    res.render('edit-post', { post: post });
});

app.put('/posts/:id', (req, res) => {
    const post = posts.find(p => p.id === parseInt(req.params.id));
    post.title = req.body.title;
    post.content = req.body.content;
    res.redirect('/');
});

app.delete('/posts/:id', (req, res) => {
    posts = posts.filter(p => p.id !== parseInt(req.params.id));
    res.redirect('/');
});

// Start the server
app.listen(3000, () => {
    console.log('Server is running on port 3000');
});
