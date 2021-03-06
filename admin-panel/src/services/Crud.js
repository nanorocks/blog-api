// import env from 'react-dotenv';
import axios from "../config/AxiosInstanceApi";
import { app } from "./../config/_index";

export function index(urlPathFromMapper, limit = 20) {
  return new Promise((resolve, reject) => {
    axios
      .get(app.BLOG_API_URL + urlPathFromMapper + limit, {})
      .then((result) => {
        resolve([result.status, result.data]);
      })
      .catch((err) => {
        resolve([err.response.status, err.response.data]);
      });
  });
}

export function store(urlPathFromMapper, entity) {
  return new Promise((resolve, reject) => {
    axios
      .post(app.BLOG_API_URL + urlPathFromMapper, entity)
      .then((result) => {
        resolve([result.status, result.data]);
      })
      .catch((err) => {
        resolve([err.response.status, err.response.data]);
      });
  });
}

export function show(urlPathFromMapper) {
  return new Promise((resolve, reject) => {
    axios
      .get(app.BLOG_API_URL + urlPathFromMapper, {})
      .then((result) => {
        resolve([result.status, result.data]);
      })
      .catch((err) => {
        resolve([err.response.status, err.response.data]);
      });
  });
}

export function update(urlPathFromMapper, entity) {
  return new Promise((resolve, reject) => {
    axios
      .put(app.BLOG_API_URL + urlPathFromMapper, entity)
      .then((result) => {
        resolve([result.status, result.data]);
      })
      .catch((err) => {
        resolve([err.response.status, err.response.data]);
      });
  });
}

export function destroy(urlPathFromMapper) {
  return new Promise((resolve, reject) => {
    axios
      .delete(app.BLOG_API_URL + urlPathFromMapper, {})
      .then((result) => {
        resolve([result.status, result.data]);
      })
      .catch((err) => {
        resolve([err.response.status, err.response.data]);
      });
  });
}
