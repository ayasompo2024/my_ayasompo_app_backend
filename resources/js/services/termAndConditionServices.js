import { endpoints } from "../constants";
import { delReqeust, getRequest, postRequest, putRequest } from "../helpers/axios";

export const termAndConditionServices = {

    index: async () => {
        const result = await getRequest(endpoints.termAndCondition, null);
        return result;
    },

    destroy: async (id) => {
        const result = await delReqeust(`${endpoints.termAndCondition}/${id}`);
        return result;
    },

    show: async (id) => {
        const result = await getRequest(`${endpoints.termAndCondition}/${id}`);
        return result;
    },

    update: async (payload, id) => {
        const result = await putRequest(`${endpoints.termAndCondition}/${id}`, payload);
        return result;
    },

    store: async (payload) => {
        const result = await postRequest(`${endpoints.termAndCondition}`, payload);
        return result;
    }
}