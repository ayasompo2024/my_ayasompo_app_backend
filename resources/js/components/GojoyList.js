import React, { useRef, useState, useCallback, useEffect } from 'react';
import { Button } from 'primereact/button';
import { DataTable } from 'primereact/datatable';
import { Dropdown } from 'primereact/dropdown';
import { Paginator } from 'primereact/paginator';
import { Chip } from 'primereact/chip';
import { Column } from 'primereact/column';
import { InputText } from 'primereact/inputtext';
import { baseURL, endpoints } from '../constants';
import { Calendar } from 'primereact/calendar';
import { Tooltip } from 'primereact/tooltip';
import { ConfirmDialog, confirmDialog } from 'primereact/confirmdialog';
import { Toast } from 'primereact/toast';
import { gojoyService } from '../services/gojoyService';
import ReactDOM from 'react-dom/client';
import moment from 'moment';

export default function GojoyList() {

    const [loading, setLoading] = useState(false);
    const [gojoy, setGoJoy] = useState([]);
    const [selectedStatus, setSelectedStatus] = useState({
        label: "ACTIVE", code: "ACTIVE"
    });

    const [paginateOptions, setPaginageOption] = useState({
        page: 1,
        per_page: 10,
        search: "",
        columns: "customer_id,full_name,nrc,dob,mobile_number,email,beneficiary_name,beneficiary_contact,tag_name",
    });

    const totalRecord = useRef(0);
    const toast = useRef(null);

    const columns = [
        { field: 'customer_id', header: 'Customer Id', show: true, with: "200px", frozen: false },
        { field: 'full_name', header: 'Full Name', show: true, with: "200px", frozen: false },
        { field: 'nrc', header: 'NRC', show: true, with: "180px", frozen: false },
        { field: 'dob', header: 'Date Of Birth', show: true, with: "250px", frozen: false },
        { field: 'mobile_number', header: 'Mobile Number', show: true, with: "180px", frozen: false },
        { field: 'email', header: 'Email', show: true, with: "180px", frozen: false },
        { field: 'beneficiary_name', header: 'Beneficiary Name', show: true, with: "180px", frozen: false },
        { field: 'beneficiary_contact', header: 'Beneficiary Contact', show: true, with: "180px", frozen: false },
        { field: 'tag_name', header: 'Tag Name', show: true, with: "180px", frozen: false },
        { field: 'status', header: 'Status', show: true, with: "180px", frozen: false },
        { field: "operation", header: "Operation", show: true, frozen: true, alignFrozen: "right" }
    ];

    const status = [
        { name: 'ACTIVE', code: 'ACTIVE' },
        { name: 'DISABLE', code: 'DISABLE' },
    ];

    /** Operation Action  */
    const reject = () => {
        toast.current.show({ severity: 'warn', summary: 'Rejected', detail: 'You have rejected', life: 3000 });
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
                const result = await gojoyService.destroy(id);
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

    /** Paginate Page Change */
    const onPageChange = async (event) => {
        setLoading(true);
        const updatePaginate = { ...paginateOptions };
        updatePaginate.page = event.page === 0 ? event.page + 1 : event.page;
        updatePaginate.per_page = event.rows;

        const result = await gojoyService.index(updatePaginate);

        if (result.status === 201 || result.status === 200) {
            updatePaginate.page = result.data.current_page;
            updatePaginate.per_page = result.data.per_page;

            setPaginageOption(updatePaginate);
            setGoJoy(result.data.data);

            totalRecord.current = result.data.total;
        }

        setLoading(false);
    };

    /** Search Gojoy Account */
    const searchCustomer = async () => {
        setLoading(true);
        const result = await gojoyService.index(paginateOptions);

        if (result.status === 201 || result.status === 200) {
            const updatePaginate = { ...paginateOptions };
            updatePaginate.page = result.data.current_page;
            updatePaginate.per_page = result.data.per_page;

            setPaginageOption(updatePaginate);
            setGoJoy(result.data.data);

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

        const result = await gojoyService.index(updatePaginate);
        
        if (result.status === 201 || result.status === 200) {
            const updatePaginate = { ...paginateOptions };
            updatePaginate.page = result.data.current_page;
            updatePaginate.per_page = result.data.per_page;

            setPaginageOption(updatePaginate);
            setGoJoy(result.data.data);

            totalRecord.current = result.data.total;
        }

        setLoading(false);
    }

    /** Customer Filter By Status */
    const onStatusChangeHandler = async (e) => {
        setLoading(true);
        setSelectedStatus(e);

        const updatePaginateOptions = { ...paginateOptions };
        updatePaginateOptions.filter = "status";
        updatePaginateOptions.filter_value = e.code;

        const result = await gojoyService.index(updatePaginateOptions);

        if (result.status === 201 || result.status === 200) {
            const updatePaginate = { ...paginateOptions };
            updatePaginate.page = result.data.current_page;
            updatePaginate.per_page = result.data.per_page;

            setPaginageOption(updatePaginate);
            setGoJoy(result.data.data);

            totalRecord.current = result.data.total;
        }

        setLoading(false);
    }

    /** Loading Initialize Data */
    const initLoading = useCallback(async () => {
        setLoading(true);
        const result = await gojoyService.index(paginateOptions);

        if (result.status === 201 || result.status === 200) {
            const updatePaginate = { ...paginateOptions };
            updatePaginate.page = result.data.current_page;
            updatePaginate.per_page = result.data.per_page;

            setPaginageOption(updatePaginate);
            setGoJoy(result.data.data);

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
                        Search by customer_id, full_name, nrc, dob, mobile_number, email, beneficiary_name, beneficiary_contact, tag_name (Press enter to search)
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
                            placeholder="Select Gojoy Status"
                            disabled={loading}
                        />
                    </div>
                    <small> Choose GoJoy Status </small>
                </div>
            </div>

            <div className='col-12 col-md-12 col-lg-12 mt-3'>
                <DataTable
                    value={gojoy}
                    scrollable
                    scrollHeight="500px"
                >
                    {columns.map((col, index) => {
                        return (
                            <Column
                                key={`gojoy_list_${col.field}_${index}`}
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
                                        case "dob":
                                            return (
                                                <span> {moment(content[col.field]).format("MM/DD/YYYY hh:mm:ss A")} </span>
                                            )
                                        case "status":
                                            return (
                                                <Chip
                                                    label={content[col.field]}
                                                    className={content[col.field] === 'ACTIVE' ? 'bg-success' : 'bg-danger'}
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

                                                    <div className='tooltip-btn' onClick={() => window.location.replace(`${baseURL}/admin/${endpoints.gojoy}/${content.id}`)}>
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
        </div>
    );
}

if (document.getElementById('gojoy-list')) {
    const root = ReactDOM.createRoot(document.getElementById('gojoy-list'));
    root.render(<GojoyList />);
}