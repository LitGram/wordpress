const express = require('express');
const path = require('path');
const app = express();
const port = 3000;

app.use(express.static('public'));
app.use(express.json());

// Simulated user database
const users = [
  { id: 1, email: 'user@example.com', password: 'password123' }
];

// Simple authentication middleware
const authenticate = (req, res, next) => {
  const token = req.headers['authorization'];
  if (token === 'Bearer valid_token') {
    next();
  } else {
    res.status(401).json({ error: 'Unauthorized' });
  }
};

app.get('/', (req, res) => {
  res.sendFile(path.join(__dirname, 'public', 'index.html'));
});

app.post('/api/login', (req, res) => {
  const { email, password } = req.body;
  const user = users.find(u => u.email === email && u.password === password);
  if (user) {
    res.json({ token: 'valid_token' });
  } else {
    res.status(401).json({ error: 'Invalid credentials' });
  }
});

app.get('/api/study-guides', authenticate, (req, res) => {
  const studyGuides = [
    { id: 1, title: 'Mathematics 101', description: 'Basic algebra and geometry' },
    { id: 2, title: 'History 101', description: 'World War II overview' },
    { id: 3, title: 'Science 101', description: 'Introduction to biology' },
  ];
  res.json(studyGuides);
});

app.listen(port, () => {
  console.log(`Server running at http://localhost:${port}`);
});