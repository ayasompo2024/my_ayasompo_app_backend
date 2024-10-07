import axios from 'axios';
import { baseURL, prefix } from '../constants';

axios.defaults.baseURL = `${baseURL}/${prefix}`;

axios.interceptors.request.use(
    (config) => {
        const token = localStorage.getItem("TOKEN") ? localStorage.getItem("TOKEN") : null;
        if (token) {
            config.headers = {
                ...config.headers,
                authorization: `Bearer ${token}`,
                Accept: "Application/json",
            };
        }

        return config;

    },
    (error) => {
        return Promise.reject(error)
    }
);

const urlParams = (params) => {
    let paramsArray = [];
    Object.keys(params).map((value) => {
        return paramsArray.push(`${value}=${params[value]}`);
    });
    return paramsArray.join("&");
}

const httpErrorResponseHandler = (error) => {
    switch(error.status) {
        case 404: 
        return {
            message: "Resource Not Found",
            status: 404
        }
        default:
            return error;
    }
}

const httpResponseHandler = (result) => {
    if(result.status === 201 || 200) {
        return {
            status: result.status,
            data: result.data.data
        }
    }
}

export const getRequest = async (path, params) => {
    try {
        const url = params ? `${path}?${urlParams(params)}` : path;
        const result = await axios.get(url);
        return httpResponseHandler(result);
    } catch (error) {
        return httpErrorResponseHandler(error.response);
    }
}

export const delReqeust = async (path) => {
    try {
        const result = await axios.delete(path);
        return httpResponseHandler(result);
    } catch (error) {
        return httpErrorResponseHandler(error.response);
    }
}

export const putRequest = async (path, payload) => {
    try {
        const result = await axios.put(path, payload);
        return httpResponseHandler(result);
    } catch (error) {
        return httpErrorResponseHandler(error.response);
    }
}

export const updateRequest = async (path, payload) => {
    try {
        const result = await axios.post(path, payload, {
            headers: {
              "Content-Type": "multipart/form-data"
            }
          });

        return httpResponseHandler(result);
    } catch (error) {
        return httpErrorResponseHandler(error.response);
    }
}

/**
 * Http post method request for updating process include mutiple files or file
 * @param {*} path 
 * @param {*} payload 
 * @returns 
 */
export const formDataRequest = async (path, payload) => {
    try {
        const result = await axios.post(path, payload, {
            headers: {
              "Content-Type": "multipart/form-data"
            }
          });
        return httpResponseHandler(result);
    } catch (error) {
        return httpErrorHandler(error.response);
    }
}