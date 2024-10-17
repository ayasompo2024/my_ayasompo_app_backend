import React, { useRef, useState, useCallback, useEffect } from 'react';
import { Button } from 'primereact/button';
import { DataTable } from 'primereact/datatable';
import { Dropdown } from 'primereact/dropdown';
import { Paginator } from 'primereact/paginator';
import { Chip } from 'primereact/chip';
import { Column } from 'primereact/column';
import { InputText } from 'primereact/inputtext';
import { Dialog } from 'primereact/dialog';
import { Image } from 'primereact/image';
import ReactDOM from 'react-dom/client';
import { delReqeust, getRequest, updateRequest } from '../helpers/axios';
import { baseURL, endpoints, notiFor } from '../constants';
import { Calendar } from 'primereact/calendar';
import { Tooltip } from 'primereact/tooltip';
import { ConfirmDialog, confirmDialog } from 'primereact/confirmdialog';
import { Toast } from 'primereact/toast';
import { payloadHandler } from '../helpers/utilities';
import { InputTextarea } from 'primereact/inputtextarea';
import { notificationService } from '../services/notificationService';
import moment from 'moment';

export default function CustomerList() {

    const [loading, setLoading] = useState(false);
    const [customers, setCustomers] = useState([]);
    const [selectedRows, setSelectedRows] = useState([]);
    const [visible, setVisible] = useState(false);
    const [selectedNotiFor, setSelectedNotiFor] = useState("");
    const [sendNotiPayload, setSendNotiPayload] = useState({
        title: "",
        message: "",
        photo: "",
        description: "",
        type: "Multicast",
        noti_for: "",
        customers: ""
    })
    const [selectedStatus, setSelectedStatus] = useState({
        label: "ACTIVE", code: 0
    });

    const [paginateOptions, setPaginageOption] = useState({
        page: 1,
        per_page: 10,
        search: "",
        columns: "customer_code,customer_phoneno,policy_number,user_name",
    });

    const totalRecord = useRef(0);
    const toast = useRef(null);
    const customerType = useRef(window.location.pathname.split("/")[4]);

    const columns = [
        { field: 'created_at', header: 'Created At', show: true, with: "200px", frozen: false },
        { field: 'customer_code', header: 'Code', show: true, with: "180px", frozen: false },
        { field: 'user_name', header: 'App User Name', show: true, with: "250px", frozen: false },
        { field: 'customer_phoneno', header: 'Customer Phone', show: true, with: "180px", frozen: false },
        { field: 'policy_number', header: 'Policy Number', show: true, with: "180px", frozen: false },
        { field: 'app_customer_type', header: 'App Customer Type', show: true, with: "180px", frozen: false },
        { field: 'is_disabled', header: 'Status', show: true, with: "180px", frozen: false },
        { field: "operation", header: "Operation", show: true, frozen: true, alignFrozen: "right" }
    ];

    const status = [
        { name: 'ACTIVE', code: 0 },
        { name: 'DISABLE', code: 1 },
    ];

    /** Operation Action  */
    const reject = () => {
        toast.current.show({ severity: 'warn', summary: 'Rejected', detail: 'You have rejected', life: 3000 });
    }

    /** Send Notification */
    const sendNotification = async () => {
        setLoading(true);
        const selectedCustomer = selectedRows.map(row => {
            return {
                user_id: row.id,
                device_token: row.device_token
            }
        })

        const formData = new FormData();

        formData.append("title", sendNotiPayload.title);
        formData.append("description", sendNotiPayload.description);
        formData.append("message", sendNotiPayload.message);
        formData.append("noti_for", sendNotiPayload.noti_for);
        formData.append("photo", sendNotiPayload.photo);
        formData.append("customers", JSON.stringify(selectedCustomer));
        formData.append("type", sendNotiPayload.type);
        formData.append("method", "PUT");

        const result = await notificationService.send(formData);

        if (result.status !== 201) {
            toast.current.show({ severity: 'warn', summary: 'Rejected', detail: result.message, life: 3000 });
        }

        setLoading(false);
        setVisible(false);
    }

    /** Delete Customer Account */
    const deleteRecordConfirm = (id) => {
        confirmDialog({
            message: 'Do you want to delete this record?',
            header: 'Delete Confirmation',
            icon: 'pi pi-info-circle',
            position: "bottom-right",
            acceptClassName: "p-button-danger",
            accept: async () => {
                setLoading(true);
                const result = await delReqeust(`${endpoints.customer}/${id}`);
                if (result.status === 201 || result.status === 200) {
                    toast.current.show({ severity: 'success', summary: 'Confirmed', detail: "Record is successfully deleted", life: 3000 });
                    await reset();
                } else {
                    toast.current.show({ severity: 'error', summary: 'Error', detail: "Somethings was wrong!", life: 3000 })
                }
                setLoading(false);
            },
            reject
        });
    };

    /** Check multiple users are selected for send notification. */
    const checkNotificationUser = async () => {

        if (selectedRows.length === 0) {
            confirmDialog({
                message: "Please selected customer to send notification.",
                header: "Custmers are not selected",
                icon: "pi pi-info-circle",
                position: "bottom-right",
                acceptClassName: "p-button-danger",
            });

            return;
        }

        setVisible(!visible);
        return;
    }

    /** Disable || Enable Customer Account */
    const disableRecordConfirm = async (content) => {
        confirmDialog({
            message: Number(content.is_disabled) === 1 ? 'Do you want to enable this record?' : 'Do you want to disable this record?',
            header: 'Status Confirmation',
            icon: 'pi pi-info-circle',
            position: "bottom-right",
            acceptClassName: "p-button-danger",
            accept: async () => {
                setLoading(true);
                const result = await updateRequest(`${endpoints.customer}/${content.id}`, {
                    is_disabled: Number(content.is_disabled) === 1 ? 0 : 1
                });
                if (result.status === 201 || result.status === 200) {
                    toast.current.show({ severity: 'success', summary: 'Confirmed', detail: "Record is updated successfully", life: 3000 });
                    await reset();
                } else {
                    toast.current.show({ severity: 'error', summary: 'Error', detail: "Somethings was wrong!", life: 3000 })
                }
                setLoading(false);
            },
            reject
        });
    }

    /** Paginate Page Change */
    const onPageChange = async (event) => {
        setLoading(true);
        const updatePaginate = { ...paginateOptions };
        updatePaginate.page = event.page === 0 ? event.page + 1 : event.page;
        updatePaginate.per_page = event.rows;

        const result = await getRequest(`${endpoints.customer}/${customerType.current}`, updatePaginate);

        if (result.status === 201 || result.status === 200) {
            updatePaginate.page = result.data.current_page;
            updatePaginate.per_page = result.data.per_page;

            setPaginageOption(updatePaginate);
            setCustomers(result.data.data);

            totalRecord.current = result.data.total;
        }

        setLoading(false);
    };

    /** Search Customer Account */
    const searchCustomer = async () => {
        setLoading(true);
        const result = await getRequest(`${endpoints.customer}/${customerType.current}`, paginateOptions);

        if (result.status === 201 || result.status === 200) {
            const updatePaginate = { ...paginateOptions };
            updatePaginate.page = result.data.current_page;
            updatePaginate.per_page = result.data.per_page;

            setPaginageOption(updatePaginate);
            setCustomers(result.data.data);

            totalRecord.current = result.data.total;
        }

        setLoading(false);
    }

    /** Reset Paginate */
    const reset = async () => {
        const updatePaginate = { ...paginateOptions };
        updatePaginate.search = "";
        setPaginageOption(updatePaginate);
        initLoading();
    }

    /** Choose Date Filter */
    const chooseDateHandler = async (e) => {
        setLoading(true);

        const updatePaginate = { ...paginateOptions };
        updatePaginate.date_column = "created_at";
        updatePaginate.date = moment(e).format("MM/DD/YYYY");

        const result = await getRequest(`${endpoints.customer}/${customerType.current}`, updatePaginate);

        if (result.status === 201 || result.status === 200) {
            const updatePaginate = { ...paginateOptions };
            updatePaginate.page = result.data.current_page;
            updatePaginate.per_page = result.data.per_page;

            setPaginageOption(updatePaginate);
            setCustomers(result.data.data);

            totalRecord.current = result.data.total;
        }

        setLoading(false);
    }

    /** Customer Filter By Status */
    const onStatusChangeHandler = async (e) => {
        setLoading(true);
        setSelectedStatus(e);

        const updatePaginateOptions = { ...paginateOptions };
        updatePaginateOptions.filter = "is_disabled";
        updatePaginateOptions.filter_value = e.code;

        const result = await getRequest(`${endpoints.customer}/${customerType.current}`, updatePaginateOptions);

        if (result.status === 201 || result.status === 200) {
            const updatePaginate = { ...paginateOptions };
            updatePaginate.page = result.data.current_page;
            updatePaginate.per_page = result.data.per_page;

            setPaginageOption(updatePaginate);
            setCustomers(result.data.data);

            totalRecord.current = result.data.total;
        }

        setLoading(false);
    }

    /** Loading Initialize Data */
    const initLoading = useCallback(async () => {
        setLoading(true);
        const result = await getRequest(`${endpoints.customer}/${customerType.current}`, paginateOptions);

        if (result.status === 201 || result.status === 200) {
            const updatePaginate = { ...paginateOptions };
            updatePaginate.page = result.data.current_page;
            updatePaginate.per_page = result.data.per_page;

            setPaginageOption(updatePaginate);
            setCustomers(result.data.data);

            totalRecord.current = result.data.total;
        }
        setLoading(false);
    }, []);

    useEffect(() => {
        initLoading();
    }, [initLoading]);

    return (
        <div className="row">
            <div className="col-12 col-md-4 col-lg-4 mt-3">
                <div className='w-full flex flex-row'>
                    <div className="p-inputgroup">
                        <span className="p-inputgroup-addon bg-rm">
                            <i className="pi pi-search"></i>
                        </span>
                        <InputText
                            className="w-full p-inputtext-sm"
                            id="customer-search"
                            aria-describedby="customer-search-help"
                            placeholder="Enter search keyword"
                            value={paginateOptions.search}
                            disabled={loading}
                            onChange={(e) => {
                                const updatePaginateOptions = { ...paginateOptions };
                                updatePaginateOptions.search = e.target.value;

                                setPaginageOption(updatePaginateOptions);
                            }}
                            onKeyDown={(e) => {
                                if (e.key === 'Enter') {
                                    searchCustomer();
                                }
                            }}
                        />
                        <Button
                            className="p-button-danger"
                            size="small"
                            icon="pi pi-undo"
                            loading={loading}
                            disabled={loading}
                            onClick={() => reset()}
                        />
                    </div>
                    <small id="customer-search-help">
                        Search by phone, name, policy, code (Press enter to search)
                    </small>
                </div>
            </div>

            <div className='col-12 col-md-3 col-lg-3 mt-3'>
                <div className='w-full flex flex-row'>
                    <div className="p-inputgroup">
                        <Calendar
                            className='calender-box'
                            placeholder='Choose Date'
                            showIcon
                            disabled={loading}
                            maxDate={new Date()}
                            dateFormat="mm/dd/yy"
                            onChange={(e) => chooseDateHandler(e.value)}
                        />
                    </div>
                    <small id="customer-calender-help">
                        Choose Created Date
                    </small>
                </div>
            </div>

            <div className='col-12 col-md-3 col-lg-3 mt-3'>
                <div className='w-full flex flex-row'>
                    <div className="p-inputgroup">
                        <Dropdown
                            className="w-full"
                            onChange={(e) => onStatusChangeHandler(e.value)}
                            options={status}
                            value={selectedStatus}
                            optionLabel="name"
                            placeholder="Select Customer Status"
                            disabled={loading}
                        />
                    </div>
                    <small> Choose Customer Status </small>
                </div>
            </div>

            <div className='col-12 col-md-12 col-lg-12 mt-3'>
                <DataTable
                    header={() => {
                        return (
                            <div className=''>
                                <Button
                                    style={{ borderRadius: "5px" }}
                                    className="p-button-danger"
                                    size="small"
                                    icon="pi pi-bell"
                                    label='Send Notification'
                                    loading={loading}
                                    disabled={loading}
                                    onClick={() => checkNotificationUser()}
                                />
                            </div>
                        )
                    }}
                    value={customers}
                    scrollable
                    scrollHeight="500px"
                    selectionMode={'checkbox'}
                    selection={selectedRows}
                    onSelectionChange={(e) => { setSelectedRows(e.value) }}
                >
                    <Column selectionMode="multiple" headerStyle={{ width: '3rem' }}></Column>
                    {columns.map((col, index) => {
                        return (
                            <Column
                                key={`customer_list_${col.field}_${index}`}
                                field={col.field}
                                header={col.header}
                                frozen={col.frozen ?? false}
                                alignFrozen={col.alignFrozen ?? "right"}
                                style={col.with ? { minWidth: `${col.with}` } : ""}
                                body={(content) => {
                                    switch (col.field) {
                                        case "created_at":
                                            return (
                                                <span> {moment(content[col.field]).format("MM/DD/YYYY hh:mm:ss A")} </span>
                                            );
                                        case "user_name":
                                            return (
                                                <div className='flex flex-row align-items-center justify-content-center'>
                                                    <Image
                                                        className='thumb-image'
                                                        src={content['profile_photo'] ?? `${baseURL}/${endpoints.defaultImagePath}`}
                                                        zoomSrc={content['profile_photo'] ?? `${baseURL}/${endpoints.defaultImagePath}`}
                                                        alt={content[col.field]}
                                                        preview
                                                    />
                                                    <span style={{ marginLeft: "5px" }}>{content[col.field]} </span>
                                                </div>
                                            );
                                        case "is_disabled":
                                            return (
                                                <Chip
                                                    label={content[col.field] === Number(0) ? 'ACTIVE' : 'DISABLE'}
                                                    className={content[col.field] === Number(0) ? 'bg-success' : 'bg-danger'}
                                                    icon="pi pi-wave-pulse"
                                                />
                                            )
                                        case "operation":
                                            return (
                                                <div className='btn-group'>
                                                    <div className='tooltip-btn' onClick={() => deleteRecordConfirm(content.id)}>
                                                        <Tooltip target=".pi-trash" content="Delete" position="top" event="hover" />
                                                        <i className='pi pi-trash' style={{ color: "#DC3545" }}></i>
                                                    </div>

                                                    <div className='tooltip-btn' onClick={() => disableRecordConfirm(content)}>
                                                        <Tooltip target=".pi-ban" content="Enable / Disable" position="top" event="hover" />
                                                        <i className='pi pi-ban' style={{ color: "#FFC107" }}></i>
                                                    </div>

                                                    <div className='tooltip-btn' onClick={() => window.location.replace(`${baseURL}/admin/${endpoints.customer}/${content.id}`)}>
                                                        <Tooltip target=".pi-file-edit" content="Edit" position="top" event="hover" />
                                                        <i className='pi pi-file-edit' style={{ color: "#17A2B8" }}></i>
                                                    </div>
                                                </div>
                                            )
                                        default:
                                            return content[col.field];
                                    }
                                }
                                }
                            />
                        )
                    })}
                </DataTable>
            </div>

            <div className='col-12 mt-3'>
                <Paginator
                    first={paginateOptions.page}
                    rows={paginateOptions.per_page}
                    totalRecords={totalRecord.current}
                    rowsPerPageOptions={[10, 50, 100]}
                    onPageChange={onPageChange}
                />
            </div>

            <Toast ref={toast} />
            <ConfirmDialog />

            <Dialog
                header={() => {
                    return (
                        <div className='w-full d-flex flex-row align-items-center justify-content-between'>
                            <label> Send Notification </label>
                            <span> Total - {selectedRows.length}</span>
                        </div>
                    )
                }}
                visible={visible}
                style={{ width: '50vw' }}
                onHide={() => { if (!visible) return; setVisible(false); }}
            >
                <div className='row'>
                    <div className="col-12 mt-3">
                        <div className='w-full flex flex-row'>
                            <label htmlFor='title'> Title* </label>
                            <div className="p-inputgroup">
                                <InputText
                                    className="w-full p-inputtext-sm"
                                    id="title"
                                    placeholder="Enter title"
                                    value={sendNotiPayload.title}
                                    disabled={loading}
                                    onChange={(e) => {
                                        payloadHandler(sendNotiPayload, e.target.value, 'title', (updatePayload) => {
                                            setSendNotiPayload(updatePayload);
                                        });
                                    }}
                                />
                            </div>
                        </div>
                    </div>

                    <div className="col-12 mt-3">
                        <div className='w-full flex flex-row'>
                            <label htmlFor='message'> Message* </label>
                            <div className="p-inputgroup">
                                <InputText
                                    className="w-full p-inputtext-sm"
                                    id="message"
                                    placeholder="Enter Message"
                                    value={sendNotiPayload.message}
                                    disabled={loading}
                                    onChange={(e) => {
                                        payloadHandler(sendNotiPayload, e.target.value, 'message', (updatePayload) => {
                                            setSendNotiPayload(updatePayload);
                                        });
                                    }}
                                />
                            </div>
                            <small> Max Length 255 </small>
                        </div>
                    </div>

                    <div className="col-12 mt-3">
                        <div className='w-full flex flex-row'>
                            <label htmlFor='photo'> Photo </label>
                            <div className="p-inputgroup">
                                <InputText
                                    type='file'
                                    className="w-full p-inputtext-sm"
                                    id="photo"
                                    placeholder="Choose photo"
                                    value={sendNotiPayload.photo}
                                    disabled={loading}
                                    onChange={(e) => {
                                        payloadHandler(sendNotiPayload, e.target.files[0], 'image_url', (updatePayload) => {
                                            setSendNotiPayload(updatePayload);
                                        });
                                    }}
                                />
                            </div>
                        </div>
                    </div>

                    <div className="col-12 mt-3">
                        <div className='w-full flex flex-row'>
                            <label htmlFor='description'> Description </label>
                            <div className="p-inputgroup">
                                <InputTextarea
                                    className="w-full p-inputtextarea-sm"
                                    id="description"
                                    rows={5}
                                    placeholder="Enter Description"
                                    value={sendNotiPayload.description}
                                    disabled={loading}
                                    onChange={(e) => {
                                        payloadHandler(sendNotiPayload, e.target.value, 'description', (updatePayload) => {
                                            setSendNotiPayload(updatePayload);
                                        });
                                    }}
                                />
                            </div>
                        </div>
                    </div>

                    <div className='col-12 mt-3'>
                        <div className='w-full flex flex-row'>
                            <div className="p-inputgroup">
                                <Dropdown
                                    className="w-full"
                                    onChange={(e) => payloadHandler(sendNotiPayload, e.target.value['code'], "noti_for", (updatePayload) => {
                                        setSelectedNotiFor(e.target.value)
                                        setSendNotiPayload(updatePayload);
                                    })}
                                    options={notiFor}
                                    value={selectedNotiFor}
                                    optionLabel="name"
                                    placeholder="Choose Notification For"
                                    disabled={loading}
                                />
                            </div>
                        </div>
                    </div>

                    <div className="col-12 mt-3">
                        <div className='w-full d-flex flex-row justify-content-end'>
                            <Button
                                style={{ borderRadius: '5px' }}
                                className="p-button-danger"
                                size="small"
                                icon="pi pi-bell"
                                label='Send'
                                loading={loading}
                                disabled={loading}
                                onClick={() => sendNotification()}
                            />
                        </div>
                    </div>
                </div>
            </Dialog>
        </div>

    );
}

if (document.getElementById('customer-list')) {
    const root = ReactDOM.createRoot(document.getElementById('customer-list'));
    root.render(<CustomerList />);
}