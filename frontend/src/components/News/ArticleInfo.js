import Card from 'react-bootstrap/Card';

const ArticleInfo = ({ article }) => {
  return (
      <Card style={{ width: '18rem' }}>
        <Card.Body>
          <Card.Title>{article.headline}</Card.Title>
          <Card.Subtitle>{article.pub_date}</Card.Subtitle>
          <Card.Subtitle>Category: {article.category}</Card.Subtitle>
          <Card.Text>
            author: {article.author}
          </Card.Text>
          <Card.Link href={article.web_url}>Visit</Card.Link>
          <Card.Footer>
            {article.source}
          </Card.Footer>
        </Card.Body>
      </Card>
  )
}

export default ArticleInfo