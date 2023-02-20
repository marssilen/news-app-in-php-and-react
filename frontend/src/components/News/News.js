import { useState, useEffect, useCallback } from 'react'
import Filter from "./Filter"
import ArticleInfo from "./ArticleInfo"
import api from "../../services/api";

function News() {

  let [articleList, setArticleList] = useState([]);
  let [query, setQuery] = useState("");
  let [sortBy, setSortBy] = useState("pub_date");
  let [orderBy, setOrderBy] = useState("asc");

  const filteredArticles = articleList.filter(
    item => {
      return (
        item.pub_date.toLowerCase().includes(query.toLowerCase()) ||
        item.category.toLowerCase().includes(query.toLowerCase()) ||
        item.source.toLowerCase().includes(query.toLowerCase())
      )
    }
  ).sort((a, b) => {
    let order = (orderBy === 'asc') ? 1 : -1;
    return (
      a[sortBy].toLowerCase() < b[sortBy].toLowerCase()
        ? -1 * order : 1 * order
    )
  })
    const articleEndpoint = "/search/news?&query=trump&page=1&providers[0]=bbc&providers[1]=theguardian&providers[2]=nytimes";

    const fetchData = useCallback(() => {
        const {data} = api.getArticles(articleEndpoint).catch((error) => {
            console.log(error);
        }).then(data => {
            setArticleList(data.data)
        })
    }, [])

  useEffect(() => {
    fetchData()
  }, [fetchData]);

  return (
    <div className="App container mx-auto mt-3 font-thin">

      <Filter query={query}
              onQueryChange={myQuery => setQuery(myQuery)}
              orderBy={orderBy}
              onOrderByChange={mySort => setOrderBy(mySort)}
              sortBy={sortBy}
              onSortByChange={mySort => setSortBy(mySort)}
      />

      <ul className="divide-y divide-gray-200">
        {filteredArticles
          .map(article => (
            <ArticleInfo //key={appointment.id}
                         article={article}
            />
          ))
        }
      </ul>
    </div>
  );
}

export default News;
