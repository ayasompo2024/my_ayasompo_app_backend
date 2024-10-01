import { endpoints } from "../constants";
import { delReqeust, getRequest, putRequest } from "../helpers/axios";

export const gojoyService = {

    index: async (paginateOptions) => {
        const result = await getRequest(endpoints.gojoy, paginateOptions);
        return result;
    },

    destroy: async (id) => {
        const result = await delReqeust(`${endpoints.gojoy}/${id}`);
        return result;
    },

    show: async (id) => {
        const result = await getRequest(`${endpoints.gojoy}/${id}`);
        return result;
    },

    update: async (payload, id) => {
        const result = await putRequest(`${endpoints.gojoy}/${id}`, payload);
        return result;
    }
}