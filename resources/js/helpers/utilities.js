export const dateFormat = [
  { label: "MM_DD_YYYY hh:mm:ss a" }
];

export const statusOptions = [
  { value: "0", label: "Active", severity: "success" },
  { value: "1", label: "Disable", severity: "danger" }
];

/**
 * Formatting For Multipart Form Data 
 * @param {*} payload 
 * @param {*} fields 
 * @returns 
 */
export const formBuilder = (payload, fields) => {

  const formData = new FormData();

  let formFileds = Object.keys(fields).filter((value) => {
    if (payload[value] != undefined || payload[value] != null) {
      return value;
    }
  });

  formFileds.map((value) => {
    formData.append(value, payload[value]);
    return value;
  });

  formData.append('method', 'PUT');
  return formData;

}

/**
 * Payload handler for update state
 * @param {*} payload
 * @param {*} value
 * @param {*} field
 * @param {*} fn
 */
export const payloadHandler = (payload, value, field, fn) => {
  let updatePayload = { ...payload };
  updatePayload[field] = value;
  fn(updatePayload);
};